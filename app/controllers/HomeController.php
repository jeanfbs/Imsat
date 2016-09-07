<?php


class HomeController extends BaseController {

	private $path;

	public function getIndex()
	{
		return View::make('home');
	}

	public function postImage()
	{
		$image = Input::get("image");
		$nome = Input::get("nome");
		$dir = Input::get("dir");
		if($image == "" || $nome == "" || $dir == "")
		{
			die("Parametros vazios!");
		}
		
		foreach (new DirectoryIterator("../public/temp") as $fileInfo) {
			// 1 dia = 86400 segundos
		    if(preg_match("/.zip/", $fileInfo->getPathname()) && (time() - filectime($fileInfo->getPathname())) > 86400) {
		    	unlink($fileInfo->getPathname());
		    }
		}

		$nameZip = "../public/temp/".$dir.".zip";
		$zip = new ZipArchive;
		
		if($zip->open($nameZip, ZipArchive::CREATE) !== TRUE)
		{
			die("Erro ao criar o arquivo Zip");
		}
		$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));
		$zip->addFromString($nome, $data);
		$zip->close();
	}
	
	public function getDocumentacao()
	{
		return View::make('documentacao');
	}
	public function getSobre()
	{
		return View::make('sobre');
	}
	public function getResultado()
	{
		return View::make('resultado');
	}
	public function getContato()
	{
		return View::make('contato');
	}
	public function postContato()
	{
		$dados = Input::all();
		
		$data = 
		[
			'nome' => $dados["nome"],
			'email' => $dados["email"],
			'assunto' => $dados["assunto"],
			'mensagem' => $dados["mensagem"]
		];

		/* ENVIA O EMAIL */
		Mail::send('emails.email',$data , function($m) use($dados){
			$m->to($dados["email"])->subject($dados["assunto"]);
		});
		return View::make('contato');
	}
	public function postRuido()
	{
		$imgb64 = Input::get("imgb64");
		if($imgb64 == null || count($imgb64) == 0)
		{
			return 0;
		}
		$decoded = base64_decode($imgb64);

		$img = imagecreatefromstring($decoded);
		$w = imagesx($img);
		$h = imagesy($img);

		$imgUtil = new ImageUtils($img);

		ob_start();
		imagepng($imgUtil->getRuido());
		$buffer = ob_get_clean();
		ob_end_clean();

		return base64_encode($buffer);
	}


}
