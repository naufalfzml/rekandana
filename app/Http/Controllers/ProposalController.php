<?php

namespace App\Http\Controllers;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProposalController extends Controller
{
    use AuthorizesRequests;
    public function index() {
        if(auth()->user()->role !== 'sponsor') {
            abort(403);
        }

        $proposals = Proposal::where('status', 'approved')->latest()->paginate(10);
        return view('sponsor.proposal.index', compact('proposals'));
    }
    public function create()
    {
        $this->authorize('create', Proposal::class);
        // Pastikan hanya mahasiswa yg bisa akses halaman ini
        if (auth()->user()->role !== 'mahasiswa') {
            abort(403);
        }
        return view('mahasiswa.proposal.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'funding_goal' => 'nullable|numeric',
            'proposal_file' => 'required|file|mimes:pdf,doc,docx|max:5120', // Maks 5MB
        ]);

        $filePath = $request->file('proposal_file')->store('proposals', 'public');

        Proposal::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'funding_goal' => $request->funding_goal,
            'file_path' => $filePath,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Proposal berhasil diajukan dan sedang direview.');
    }

    //Untuk menambahkan proposal ke daftar minat
    public function save(Proposal $proposal) {
        auth()->user()->savedProposals()->attach($proposal->id);
        return back()->with('success', 'Proposal disimpan ke daftar minat');
    }

    public function unsave(Proposal $proposal)
    {
        auth()->user()->savedProposals()->detach($proposal->id);
        return back()->with('success', 'Proposal dihapus dari daftar minat.');
    }
    public function myProposals()
    {
        // Mengambil semua proposal yang user_id-nya sama dengan ID user yang login
        $proposals = auth()->user()->proposals()->latest()->get();
        
        // Mengarahkan ke view yang benar untuk mahasiswa
        return view('mahasiswa.proposal.index', compact('proposals'));
    }

    public function show(Proposal $proposal)
    {
        // Pastikan hanya sponsor yang bisa melihat detail proposal yang sudah di-approve
        if ($proposal->status !== 'approved') {
            abort(404); 
        }
        
        return view('sponsor.proposal.show', compact('proposal'));
    }

    //Menampilkan daftar proposal yang disimpan oleh sponsor.
    public function saved()
    {
        $proposals = auth()->user()->savedProposals()->latest()->paginate(10);

        return view('sponsor.proposal.saved', compact('proposals'));
    }
}