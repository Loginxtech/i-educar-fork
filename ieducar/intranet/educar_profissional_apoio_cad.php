<?php

use App\Models\LegacyEnrollment;

return new class extends clsCadastro
{
    /**
     * Referencia pega da session para o idpes do usuario atual
     *
     * @var int
     */
    public $pessoa_logada;

    public $enrollment;

    public function Inicializar()
    {
        $retorno = 'Novo';

        $this->enrollment = LegacyEnrollment::query()
            ->with([
                'schoolClass:cod_turma,nm_turma,ano',
            ])
            ->where('id', $_GET['enrollment'])
            ->firstOrFail();

        $obj_permissoes = new clsPermissoes();
        $obj_permissoes->permissao_cadastra(578, $this->pessoa_logada, 7, "educar_matricula_lst.php?ref_cod_aluno={$this->ref_cod_aluno}");
        $this->fexcluir = false;

        $this->breadcrumb('Vínculo do profissional de apoio', [
            url('intranet/educar_index.php') => 'Escola',
        ]);

        $this->url_cancelar = "educar_matricula_det.php?cod_matricula={$this->enrollment->ref_cod_matricula}";
        $this->nome_url_cancelar = 'Cancelar';

        return $retorno;
    }

    public function Gerar()
    {
        // primary keys
        $this->campoOculto('enrollment_id', $this->enrollment->id);
        $this->campoTexto('nm_aluno', 'Aluno', $this->enrollment->studentName, 40, 255, false, false, false, '', '', '', '', true);
        $this->campoTexto('nm_turma', 'Turma', $this->enrollment->schoolClass->name, 40, 255, false, false, false, '', '', '', '', true);

        $hiddenInputOptions = ['options' => ['value' => $this->enrollment->cod_profissional_apoio]];
            $helperOptions = ['objectName' => 'cod_profissional_apoio', 'hiddenInputOptions' => $hiddenInputOptions];
            $options = [
                'label' => 'Profissional de apoio',
                'size' => 40,
                'required' => false,
            ];
            $this->inputsHelper()->simpleSearchServidor(attrName: 'nome', inputOptions: $options, helperOptions: $helperOptions);
    }

    public function Novo()
    {
        $obj_permissoes = new clsPermissoes();
        $obj_permissoes->permissao_cadastra(578, $this->pessoa_logada, 7, "educar_matricula_det.php?cod_matricula={$this->enrolloment->ref_cod_matricula}");

        $this->enrollment = LegacyEnrollment::findOrFail($this->enrollment_id);
        $this->enrollment->cod_profissional_apoio = $this->cod_profissional_apoio_id ?: null;

        if ($this->enrollment->save()) {
            $this->mensagem = 'Profissional de apoio vinculado com sucesso!';
            $this->simpleRedirect("educar_matricula_det.php?cod_matricula={$this->enrollment->ref_cod_matricula}");
        }

        $this->mensagem = 'Não foi possível vincular o professional de apoio.';

        return false;
    }

    public function Formular()
    {
        $this->title = 'Vincular profissional de apoio';
        $this->processoAp = '578';
    }
};
