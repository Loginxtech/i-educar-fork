<?php

class Portabilis_View_Helper_Input_Resource_SimpleSearchServidor extends Portabilis_View_Helper_Input_SimpleSearch
{
    protected function resourceValue($id)
    {
        if ($id) {
            $sql = '
                select nome
                from pmieducar.servidor
                join cadastro.pessoa ON pessoa.idpes = servidor.cod_servidor
                where cod_servidor = $1
            ';
            $options = ['params' => $id, 'return_only' => 'first-field'];

            return Portabilis_Utils_Database::fetchPreparedQuery($sql, $options);
        }
    }

    public function simpleSearchServidor($attrName = '', $options = [])
    {
        $defaultOptions = [
            'objectName' => 'servidor',
            'apiController' => 'Servidor',
            'apiResource' => 'servidor-search',
        ];

        $options = $this->mergeOptions($options, $defaultOptions);

        parent::simpleSearch($options['objectName'], $attrName, $options);
    }

    protected function inputPlaceholder($inputOptions)
    {
        return 'Digite um nome para buscar';
    }

    protected function loadAssets()
    {
        $jsFile = '/vendor/legacy/Portabilis/Assets/Javascripts/Frontend/Inputs/Resource/SimpleSearchServidor.js';
        Portabilis_View_Helper_Application::loadJavascript($this->viewInstance, $jsFile);
    }
}
