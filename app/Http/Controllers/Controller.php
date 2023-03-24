<?php

namespace App\Http\Controllers;

use App\Models\{Customers, Employees, Products, Offices, Orders, Productlines, Orderdetails, Payments};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function dashboard(){
        
        $clientes = Customers::count();
        $produtos = Products::count();
        $pedidos = Orders::count();
        
        return view('dashboard', compact(['clientes', 'produtos', 'pedidos']));
    }

    public function clientes(){
        
        $clientes = Customers::orderByDesc('customerNumber')
        ->get(); 
        $funcionarios = Employees::orderByDesc('employeeNumber')
        ->get();  
        
        return view('welcome', compact(['clientes', 'funcionarios']));
    }


    public function funcionarios(){
        
        $funcionarios = Employees::orderByDesc('employeeNumber')
        ->get();    
        
        return view('funcionarios')->with('funcionarios', $funcionarios);
    }


    public function escritorios(){
        
        $escritorios = Offices::orderByDesc('officeCode')
        ->get();    
        
        return view('escritorios')->with('escritorios', $escritorios);
    }


    public function produtos(){
        
        $produtos = Products::orderByDesc('productCode')
        ->get();    
        $categorias = Productlines::get(); 
        
        return view('produtos', compact(['produtos','categorias']));
    }


    public function categorias(){
        
        $categorias = Productlines::orderByDesc('productLine')
        ->get();    
        
        return view('categorias')->with('categorias', $categorias);
    }


    public function pedidos(){
        
        $pedidos = Orders::orderByDesc('orderNumber')
        ->get();    
        
        return view('pedidos')->with('pedidos', $pedidos);
    }


    public function detalhesPedidos(){
        
        $detalhesPedidos = Orderdetails::orderByDesc('orderdetails')
        ->get();    
        
        return view('detalhesPedidos')->with('detalhesPedidos', $detalhesPedidos);
    }


    public function pagamentos(){
        
        $pagamentos = Payments::orderByDesc('customerNumber')
        ->get();    
        
        return view('pagamentos')->with('pagamentos', $pagamentos);
    }


    public function actionClientes(Request $request){

        if ($request->tipo) {
            $cliente = Customers::find($request->tipo);

            $cliente["customerName"] = $request->empresa;
            $cliente["contactLastName"] = $request->sobrenome;
            $cliente["contactFirstName"] = $request->nome;
            $cliente["phone"] = $request->telefone;
            $cliente["addressLine1"] = $request->endereco;
            $cliente["addressLine2"] = $request->complemento;
            $cliente["city"] = $request->cidade;
            $cliente["state"] = $request->estado;
            $cliente["postalCode"] = $request->postal;
            $cliente["country"] = $request->pais;
            $cliente["salesRepEmployeeNumber"] = $request->funcionario;

            $cliente->save();
        }else{
            $cliente = Customers::create([
                "customerName" => $request->empresa,
                "contactLastName" => $request->sobrenome,
                "contactFirstName" => $request->nome,
                "phone" => $request->telefone,
                "addressLine1" => $request->endereco,
                "addressLine2" => $request->complemento,
                "city" => $request->cidade,
                "state" => $request->estado,
                "postalCode" => $request->postal,
                "country" => $request->pais,
                "salesRepEmployeeNumber" => $request->funcionario,
            ]);            
        }  
        
        return true;
    }

    public function actionClientesDeletar(Request $request)
    {
        Customers::find($request->id)->delete();
        return true;
    }

    public function actionProdutos(Request $request){

        if ($request->tipo) {
            $produto = Products::find($request->tipo);

            $produto["productName"] = $request->productName;
            $produto["productLine "] = $request->productLine;
            $produto["productScale"] = $request->productScale;
            $produto["productVendor"] = $request->productVendor;
            $produto["productDescription"] = $request->productDescription;
            $produto["quantityInStock"] = $request->quantityInStock;
            $produto["buyPrice"] = $request->buyPrice;
            $produto["MSRP"] = $request->MSRP;

            $produto->save();
        }else{
            $produto = Products::create([
                "productName" => $request->productName,
                "productLine" => $request->productLine,
                "productScale" => $request->productScale,
                "productVendor" => $request->productVendor,
                "productDescription" => $request->productDescription,
                "quantityInStock" => $request->quantityInStock,
                "buyPrice" => $request->buyPrice,
                "MSRP" => $request->MSRP,
            ]);            
        }  
        
        return true;
    }

    public function actionProdutosDeletar(Request $request)
    {
        Products::find($request->id)->delete();
        return true;
    }

    

}


