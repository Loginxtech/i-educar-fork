@extends('layout.default')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ Asset::get('css/ieducar.css') }}" />
@endpush

@section('content')
    <div>
        <table class="tablelistagem" width="100%">
            <tbody>
                <tr>
                    <td class="titulo-tabela-listagem" colspan="13">Lista de enturmações da matrícula</td>
                </tr>
                <tr>
                    <td class="formdktd" valign="top" align="left" style="font-weight:bold;">Sequencial</td>
                    <td class="formdktd" valign="top" align="left" style="font-weight:bold;">Turma</td>
                    <td class="formdktd" valign="top" align="left" style="font-weight:bold;">Profissional de apoio</td>
                    <td class="formdktd" valign="top" align="left" style="font-weight:bold;">Ativo</td>
                </tr>
                @foreach($registration->enrollments->sortBy('sequencial') as $enrollment)
                <tr>
                    <td {!! ($loop->iteration % 2) == 1 ? 'class="formlttd"' : 'class="formmdtd"' !!} valign="top" align="left">
                        <a href="/intranet/educar_profissional_apoio_cad.php?enrollment={{$enrollment->id}}">{{ $enrollment->sequencial }}</a>
                    </td>
                    <td {!! ($loop->iteration % 2) == 1 ? 'class="formlttd"' : 'class="formmdtd"' !!} valign="top" align="left">
                        <a href="/intranet/educar_profissional_apoio_cad.php?enrollment={{$enrollment->id}}">{{ $enrollment->schoolClass->name }}</a>
                    </td>
                    <td {!! ($loop->iteration % 2) == 1 ? 'class="formlttd"' : 'class="formmdtd"' !!} valign="top" align="left">
                        <a href="/intranet/educar_profissional_apoio_cad.php?enrollment={{$enrollment->id}}">{{ $enrollment?->supportProfissional?->name }}</a>
                    </td>
                    <td {!! ($loop->iteration % 2) == 1 ? 'class="formlttd"' : 'class="formmdtd"' !!} valign="top" align="left">
                        <a href="/intranet/educar_profissional_apoio_cad.php?enrollment={{$enrollment->id}}">{{ $enrollment->ativo ? 'Sim' : 'Não'}}</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="13" align="center">
                        <input type="button" class="btn-green botaolistagem" onclick="javascript: go('/intranet/educar_matricula_det.php?cod_matricula={{ $registration->id }}')" value=" Voltar ">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection


