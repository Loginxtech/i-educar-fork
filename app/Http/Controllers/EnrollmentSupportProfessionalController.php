<?php

namespace App\Http\Controllers;

use App\Models\LegacyRegistration;
use Illuminate\Contracts\View\View;

class EnrollmentSupportProfessionalController extends Controller
{
    public function index(int $id): View
    {
        $this->breadcrumb('Vincular profissional de apoio', [
            url('intranet/educar_index.php') => 'Escola',
        ]);

        $this->menu(578);

        $registration = LegacyRegistration::query()->with([
            'enrollments:id,ref_cod_matricula,ref_cod_turma,sequencial,ativo,cod_profissional_apoio',
            'enrollments.schoolClass:cod_turma,nm_turma,ano',
        ])
            ->findOrFail($id, ['cod_matricula']);

        return view('enrollments.enrollmentSupportProfessionalList', ['registration' => $registration]);
    }
}
