<?php 

class ImageUtils{

	private $img;
	private $w;
	private $h;

	public function ImageUtils($img = null){
		
		$this->img = $img;
		if($this->img == null) die("Imagem está nula!");

		$this->w = imagesx($this->img);
		$this->h = imagesy($this->img);
	}

	public function getEscalaCinza()
	{
		$in =  time();
		$img = imagecreatetruecolor($this->w, $this->h);

		for ($x=0; $x < $this->w; $x++) { 
			for ($y=0; $y < $this->h; $y++) { 
				
				$rgb = imagecolorat($this->img, $x, $y);
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;

				$avg = intval(($r +$g +$b) / 3);
				$pixel = imagecolorallocate($img,$avg,$avg,$avg);

				imagesetpixel($img, $x, $y, $pixel);
				
			}
		}
		$fin =  time();
		file_put_contents("t.txt","Inicio: ".$in."  Fim: ".$fin."\t\t T:".($fin - $in)." ms\n",FILE_APPEND);
		return $img;


	}

	public function getSepia()
	{
		$img = imagecreatetruecolor($this->w, $this->h);

		for ($x=0; $x < $this->w; $x++) { 
			for ($y=0; $y < $this->h; $y++) { 
				
				$rgb = imagecolorat($this->img, $x, $y);
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;

				$avg = intval(($r +$g +$b) / 3);
				$pixel = imagecolorallocate($img,$avg+100,$avg+50,$avg);

				imagesetpixel($img, $x, $y, $pixel);
				
			}
		}

		return $img;
	}

	public function getNegative()
	{
		$img = imagecreatetruecolor($this->w, $this->h);

		for ($x=0; $x < $this->w; $x++) { 
			for ($y=0; $y < $this->h; $y++) { 
				
				$rgb = imagecolorat($this->img, $x, $y);
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;
				$pixel = imagecolorallocate($img,255 - $r,255 - $g,255 - $b);

				imagesetpixel($img, $x, $y, $pixel);
				
			}
		}

		return $img;


	}

	public function getRuido()
	{
		$factor = 70;

		$img = imagecreatetruecolor($this->w, $this->h);

		for ($x=0; $x < $this->w; $x++) { 
			for ($y=0; $y < $this->h; $y++) { 
				
				$rgb = imagecolorat($this->img, $x, $y);
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;
				$rand = floatval(rand(1,100) / 100);

				$rand = (0.5 - $rand) * $factor;
				$pixel = imagecolorallocate($img,$rand + $r,$rand + $g,$rand + $b);

				imagesetpixel($img, $x, $y, $pixel);
				
			}
		}

		return $img;


	}


	public function hsv_to_rgb($H, $S, $V)  // HSV Values:Number 0-1
	{                                 // RGB Results:Number 0-255
	    $RGB = array();

	    if($S == 0)
	    {
	        $R = $G = $B = $V * 255;
	    }
	    else
	    {
	        $var_H = $H * 6;
	        $var_i = floor( $var_H );
	        $var_1 = $V * ( 1 - $S );
	        $var_2 = $V * ( 1 - $S * ( $var_H - $var_i ) );
	        $var_3 = $V * ( 1 - $S * (1 - ( $var_H - $var_i ) ) );

	        if       ($var_i == 0) { $var_R = $V     ; $var_G = $var_3  ; $var_B = $var_1 ; }
	        else if  ($var_i == 1) { $var_R = $var_2 ; $var_G = $V      ; $var_B = $var_1 ; }
	        else if  ($var_i == 2) { $var_R = $var_1 ; $var_G = $V      ; $var_B = $var_3 ; }
	        else if  ($var_i == 3) { $var_R = $var_1 ; $var_G = $var_2  ; $var_B = $V     ; }
	        else if  ($var_i == 4) { $var_R = $var_3 ; $var_G = $var_1  ; $var_B = $V     ; }
	        else                   { $var_R = $V     ; $var_G = $var_1  ; $var_B = $var_2 ; }

	        $R = $var_R * 255;
	        $G = $var_G * 255;
	        $B = $var_B * 255;
	    }

	    $RGB['R'] = $R;
	    $RGB['G'] = $G;
	    $RGB['B'] = $B;

	    return $RGB;
	}


}