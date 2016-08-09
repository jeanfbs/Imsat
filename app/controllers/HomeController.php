<?php


class HomeController extends BaseController {

	
	public function getIndex()
	{
		return View::make('home');
	}

	public function postImage()
	{
		$array = Input::get("images");

		$path = "../app/temp/";
		foreach (new DirectoryIterator($path) as $fileInfo) {
		    if(!$fileInfo->isDot()) {
		    	if(!preg_match("/.htaccess/", $fileInfo->getPathname()))
		    		unlink($fileInfo->getPathname());
		    }
		}
		
		$zip = new ZipArchive;
		$nameZip = date('Y-m-d-H-i-s').".zip";
		$res = $zip->open($path.$nameZip, ZipArchive::CREATE);
		if ($res !== TRUE) return 0;
		foreach ($array as $key => $value) {
			$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $value["base64"]));
			$zip->addFromString($value["nome"], $data);
		}
		$zip->close();

		return $path.$nameZip;
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
