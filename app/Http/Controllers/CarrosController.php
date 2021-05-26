<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CarrosController extends Controller
{
    public function search()
    {
       return view('Carros.search'); 
    }

    public function list()
    {
        $Carros = Carro::get();
        return view('Carros.list',['carros'=> $Carros]);
    }

    public function delete($id)
    {
        $Carro = Carro::FindOrFail($id);
        $Carro->delete();
        return Redirect::to('/ListarCarros');
    }

    public function insert($registro)
    {
        $Carro = new Carro();

        $Carro->updateOrCreate(
            ['user_id'=>Auth::user()->id,
            'nome_veiculo' => $registro['nome_veiculo']]
            
            ,

            ['user_id'=>Auth::user()->id,
            'nome_veiculo' => $registro['nome_veiculo'],
            'link' => $registro['link'],
            'ano' => $registro['ano'],
            'combustivel' => $registro['combustivel'],
            'portas' => $registro['portas'],
            'quilometragem' => $registro['quilometragem'],
            'cambio' => $registro['cambio'],
            'cor' => $registro['cor']]
        );
    }

    public function add(Request $request)
    {       
        try 
        {
            $termo = Trim($request->input('searchinput'));
        
            $controller = new CarrosController;
            $ArraysCarro = $controller->Scrap($termo);
            
            foreach ($ArraysCarro as $carro) 
            {
                $controller->insert($carro);
            }  
            return Redirect::to('/ListarCarros');      
        } catch (Exception $e) 
        {
            return "Ocorreu uma situação inesperada. Detalhes: " . $e->getMessage();
        }
    }

    public function Scrap($termo)
    {
        $url = "https://www.questmultimarcas.com.br/estoque?termo=" . $termo;
        $client = new \GuzzleHttp\Client();

        $response = $client->get($url);
        $html = $response->getBody()->getContents();

        $crawler = new \Symfony\Component\DomCrawler\Crawler($html);

        $arrayCarros = $crawler->filter('div[class="card__inner"]')->each(function ($node) {
            
            $link = $node->filter('a')->attr('href');
            $nome_veiculo = $node->filter('a')->text();
            $arrayAtributosCarro = $node->filter('span[class="card-list__info"]')->each(function ($atributosCarro) {
                return[ $atributosCarro->text() ];
            });

            $ano = current($arrayAtributosCarro[0]);
            $quilometragem = current($arrayAtributosCarro[1]);
            $combustivel = current($arrayAtributosCarro[2]);
            $cambio = current($arrayAtributosCarro[3]);
            $portas = current($arrayAtributosCarro[4]);
            $cor = current($arrayAtributosCarro[5]);

            //  print_r($ano);
            //  echo "<br>";
            //  print_r($quilometragem);
            //  echo "<br>";
            //  print_r($combustivel);
            //  echo "<br>";
            //  print_r($cambio);
            //  echo "<br>";
            //  print_r($portas);
            //  echo "<br>";
            //  print_r($cor );
            //  echo "<br><br><br>";
                            
            return [
                "nome_veiculo" => $nome_veiculo,
                "link" => $link,
                "ano" => $ano,
                "quilometragem" => $quilometragem,
                "combustivel" => $combustivel,
                "cambio" => $cambio,
                "portas" => $portas,
                "cor" => $cor
            ];
        });
        return $arrayCarros;
    }

  
}
