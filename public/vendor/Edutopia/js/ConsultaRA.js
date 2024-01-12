//Função que busca ra do aluno no sed e preenche os dados de cadastro em jq

function consultaRA() {
  console.log('consultaRA');
    let ra = $j('#aluno_estado_id').val();
    let strRa = ra.replace(/[^0-9]/g, '')

    // Caixa de confirmacao para o usuario escolher se quer ou nao preencher os dados automaticamente
    if (confirm('Deseja preencher os dados automaticamente?')) {

        if (strRa.length > 0) {
            fetch('/sed/consulta-ra/' + strRa, {
                method: 'GET',
                headers: {'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]')['content']}
                })
            .then((response) => {
                return response.json();
            })
            .then((data) => {

                if (data.status != 'disabled'){
                    if(data.status == 'success') {
                        // console.log(data.aluno);
                        $j('#id_federal').val(data.aluno.outDocumentos.outCPF);
                        $j('#aluno_inep_id').val(data.aluno.outDocumentos.outCodeINEP);
                        $j('#data_nascimento').val(data.aluno.outDadosPessoais.outDataNascimento);
                        $j('#aluno_sexo_id').val(data.aluno.outDadosPessoais.outSexo);

                        // Cadastro pessoa aluno
                        $j('#nome-pessoa-aluno').val(data.aluno.outDadosPessoais.outNomeAluno);
                        $j('#nome-social-pessoa-aluno').val(data.aluno.outDadosPessoais.outNomeAfetivo);
                        if (data.aluno.outDadosPessoais.outCodSexo) {
                            if (data.aluno.outDadosPessoais.outCodSexo == 2) {
                                $j('#sexo-pessoa-aluno').val('F');
                            } else {
                                $j('#sexo-pessoa-aluno').val('M');
                            }
                        }
                        //$j('#estado-civil-pessoa-aluno').val(data.aluno.);
                        $j('#data-nasc-pessoa-aluno').val(data.aluno.outDadosPessoais.outDataNascimento);
                        // $j('#ddd_telefone_fixo').val(data.aluno.);
                        // $j('#telefone_fixo').val(data.aluno.);
                        // $j('#ddd_telefone_cel').val(data.aluno.);
                        // $j('#telefone_cel').val(data.aluno.);
                        $j('#cor_raca').val(data.aluno.outDadosPessoais.outCorRaca);
                        $j('#tipo_nacionalidade').val(data.aluno.outDadosPessoais.outNacionalidade);
                        $j('#pais_origem_nome').val(data.aluno.outDadosPessoais.outNomePaisOrigem);
                        $j('#naturalidade_aluno_pessoa-aluno').val(data.aluno.outDadosPessoais.outNomeMunNascto);

                        $j('#address').val(data.aluno.outEnderecoResidencial.outLogradouro);
                        $j('#number').val(data.aluno.outEnderecoResidencial.outNumero);
                        $j('#complement').val(data.aluno.outEnderecoResidencial.outComplemento);
                        $j('#neighborhood').val(data.aluno.outEnderecoResidencial.outBairro);
                        $j('#city_city').val(data.aluno.outEnderecoResidencial.outNomeCidade);
                        $j('#postal_code').val(data.aluno.outEnderecoResidencial.outCep);

                        //$j('#pais_residencia').val(data.aluno.outEnderecoResidencial.);
                        if (data.aluno.outEnderecoResidencial.outAreaLogradouro == 'Rural') {
                            $j('#zona_localizacao_censo').val(2);
                        } else {
                            $j('#zona_localizacao_censo').val(1);
                        }
                        $j('#localizacao_diferenciada').val(data.aluno.outEnderecoResidencial.outCodLocalizacao);

                        alert('RA Encontrado com sucesso. Todos os dados já cadastrados foram preenchidos automaticamente. Verifique se os dados estão corretos e clique em salvar.');
                    } else {
                        $j('#aluno_estado_id').val('');
                        alert(data.message);
                    }
                }
            })
            .catch((error) => {
                alert('Erro de comunicação com o sed, tente novamente mais tarde')
            });
        }
    }
}

$j(document).ready(function () {
    $j('#aluno_estado_id').blur(consultaRA);
});
