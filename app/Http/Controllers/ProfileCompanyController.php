<?php

namespace App\Http\Controllers;

use App\Models\ProfileCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProfileCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        try {

            // Validate required fields first
            $request->validate([
                'site_url' => 'nullable|url|max:255',
                'facebook_url' => 'nullable|url|max:255',
                'instagram_url' => 'nullable|url|max:255',
                'linkedin_url' => 'nullable|url|max:255',
                'about' => 'nullable|min:10|max:255',
            ], [
                'site_url.url' => 'O site deve ser uma URL válida.',
                'site_url.max' => 'A URL do site não pode ter mais que 255 caracteres.',
                'facebook_url.url' => 'O link do Facebook deve ser uma URL válida.',
                'facebook_url.max' => 'A URL do Facebook não pode ter mais que 255 caracteres.',
                'instagram_url.url' => 'O link do Instagram deve ser uma URL válida.',
                'instagram_url.max' => 'A URL do Instagram não pode ter mais que 255 caracteres.',
                'linkedin_url.url' => 'O link do LinkedIn deve ser uma URL válida.',
                'linkedin_url.max' => 'A URL do LinkedIn não pode ter mais que 255 caracteres.',
                'about.min' => 'Sobre deve pelo menos 10 caracteres.',
                'about.max' => 'Sobre não pode ter mais que 255 caracteres.',
            ]);

            $profileCompany = ProfileCompany::findOrFail($id);

            if (!$profileCompany) {
                return redirect()->back()->with('error', 'Não possível atualizar os dados de perfil da empresa, por favor tente novamente mais tarde!');
            }

            // Update unit data - no need for fallback since we validated the fields
            $profileCompany->site_url = $request->site_url;
            $profileCompany->facebook_url = $request->facebook_url;
            $profileCompany->linkedin_url = $request->linkedin_url;
            $profileCompany->instagram_url = $request->instagram_url;
            $profileCompany->about = $request->about;
            $profileCompany->save();

            DB::commit();
            return redirect()->back()->with('success', 'Dados do perfil da Empresa editados com sucesso!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao editar dados da empresa: ' . $e->getMessage(), [
                'id_profile_company' => $id,
                'request_data' => $request->all()
            ]);

            return redirect()->back()->with('error', 'Não foi possível editar dados da empresa agora. Verifique os dados ou tente mais tarde!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
