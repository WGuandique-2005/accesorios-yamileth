<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::where('rol', 'cliente')
            ->withCount('orders')
            ->withSum('orders as total_comprado', 'precio_total')
            ->latest()
            ->paginate(15);
        $selectedClient = null;

        return view('admin.clientes', compact('clients', 'selectedClient'));
    }

    public function show(int $id)
    {
        $clients = User::where('rol', 'cliente')
            ->withCount('orders')
            ->withSum('orders as total_comprado', 'precio_total')
            ->latest()
            ->paginate(15);
        $selectedClient = User::where('rol', 'cliente')
            ->with(['orders' => fn ($query) => $query->with('orderItems.product')->latest()])
            ->withCount('orders')
            ->withSum('orders as total_comprado', 'precio_total')
            ->findOrFail($id);

        return view('admin.clientes', compact('clients', 'selectedClient'));
    }

    public function destroy(int $id)
    {
        $client = User::where('rol', 'cliente')->withCount('orders')->findOrFail($id);

        if ($client->orders_count > 0) {
            return back()->with('error', 'No se puede eliminar un cliente con pedidos registrados.');
        }

        try {
            $client->delete();
        } catch (QueryException) {
            return back()->with('error', 'No se pudo eliminar el cliente porque tiene historial asociado.');
        }

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
