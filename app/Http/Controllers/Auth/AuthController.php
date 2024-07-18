<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Usuario;
use App\Models\Produto;
use App\Models\Categoria;
use Hash;

class AuthController extends Controller
{
    /**
     *
     * @return response()
     */
    public function index()
    {
        return view('login.login');
    } 

    /**
     *
     * @return response()
     */
    public function cadastrar()
    {
        return view('login.registration');
    }

    /**
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'senha' => 'required',
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'senha' => $request->input('senha'),
        ];
   
        // $credentials = $request->only('email', 'senha');
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('senha')])) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Você realizou o login com sucesso!');
        }
  
        return redirect("login")->withSuccess('Ops! Favor verificar suas credenciais.');
    }

    /**
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:usuario',
            'senha' => 'required|min:6',
        ]);
           
        $data   = $request->all();
        $check  = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Parabens! Cadastro efetuado com sucesso.');
    }

    /**
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){

            // Obter os últimos cinco registros de Produto e Categoria
            $ultimosProdutos = Produto::orderBy('id', 'desc')->take(5)->get();
            $ultimasCategorias = Categoria::orderBy('id', 'desc')->take(5)->get();
            $usuario = Auth::user();

            // Passar os dados para a view
            return view('dashboard', compact('ultimosProdutos', 'ultimasCategorias', 'usuario'));
        }
  
        return redirect("login")->withSuccess('Opps! Parece que você ainda não tem acesso.');
    }

    /**
     *
     * @return response()
     */
    public function create(array $data)
    {
      return Usuario::create([
        'nome' => $data['nome'],
        'email' => $data['email'],
        'senha' => Hash::make($data['senha'])
      ]);
    }

    /**
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}