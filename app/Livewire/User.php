<?php

namespace App\Livewire;

use App\Models\User as Usuario;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    use WithPagination;

    // Propiedades para el formulario - ACTUALIZADAS
    public $name, $email, $password, $role, $number;
    public $userId;
    public $isOpen = false;
    public $search = '';

    // Reglas de validación - ACTUALIZADAS
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => $this->userId ? 'nullable|min:6' : 'required|min:6',
            'role' => 'required|in:admin,user,editor',
            'number' => 'nullable|string|max:20', // Campo number agregado
        ];
    }

    // Resetea los campos del formulario - ACTUALIZADO
    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->number = '';
        $this->userId = null;
        $this->isOpen = false;
    }

    // Abre el modal para crear usuario
    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    // Edita un usuario existente - ACTUALIZADO
    public function edit($id)
    {
        $user = Usuario::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->number = $user->number;
        $this->password = '';
        $this->isOpen = true;
    }

    // Guarda o actualiza un usuario - ACTUALIZADO
    public function store()
    {
        $validatedData = $this->validate();

        if ($this->userId) {
            // Actualizar usuario existente
            $user = Usuario::find($this->userId);
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'role' => $validatedData['role'],
                'number' => $validatedData['number'],
            ]);

            // Actualizar contraseña solo si se proporcionó
            if (!empty($validatedData['password'])) {
                $user->update(['password' => Hash::make($validatedData['password'])]);
            }

            session()->flash('message', 'Usuario actualizado correctamente.');
        } else {
            // Crear nuevo usuario
            Usuario::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => $validatedData['role'],
                'number' => $validatedData['number'],
            ]);

            session()->flash('message', 'Usuario creado correctamente.');
        }

        $this->resetInputFields();
    }

    // Elimina un usuario
    public function delete($id)
    {
        Usuario::find($id)->delete();
        session()->flash('message', 'Usuario eliminado correctamente.');
    }

    // Renderiza la vista
    public function render()
    {
        $users = Usuario::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('number', 'like', '%' . $this->search . '%') // Buscar por número también
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.User.user', compact('users'))->layout('dashboard');
    }
}