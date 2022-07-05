<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf
{
	/**
	 * Get an instance of CodeIgniter
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function ci()
	{
		return get_instance();
	}

	/**
	 * Load a CodeIgniter view into domPDF
	 *
	 * @access	public
	 * @param	string	$view The view to load
	 * @param	array	$data The view data
	 * @return	void
	 */
	public function load_view($view, $data = array())
	{

		$mpdf = new \Mpdf\Mpdf();
		$html = $this->ci()->load->view($view, $data, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
	}

	public function download_pdf($view, $data = array(), $filname)
	{
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->ci()->load->view($view, $data, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filname,'D'); // it downloads the file into the user system, with give name
	}

	public function save_pdf($view, $data = array(), $filname, $folder)
	{
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->ci()->load->view($view, $data, TRUE);
        $mpdf->WriteHTML($html);
        $filePath = 'upload/'.$folder.'/'.$filname;
        $uploaddir = 'upload/'.$folder.'/';
        if(!is_dir($uploaddir))
		{
			mkdir($uploaddir);
		}
        $mpdf->Output($filePath,'F'); // it downloads the file into the user system, with give name

        return $filePath;
	}

	function mergePdf($pdf1_path,$pdf2_path,$folder,$filename)
	{
		$mpdf = new \Mpdf\Mpdf();
		$filenames = array($pdf1_path,$pdf2_path);
		//pre($filenames); die;
	    if ($filenames)
	    {
	        $filesTotal = sizeof($filenames);
	        $fileNumber = 1;
	        $mpdf->SetImportUse();

	        foreach ($filenames as $fileName) {
	            if (file_exists($fileName)) {
	                $pagesInFile = $mpdf->SetSourceFile($fileName);
	                for ($i = 1; $i <= $pagesInFile; $i++) {
	                    $tplId = $mpdf->ImportPage($i);
	                    $mpdf->UseTemplate($tplId);
	                    if (($fileNumber < $filesTotal) || ($i != $pagesInFile)) {
	                        $mpdf->WriteHTML('<pagebreak />');
	                    }
	                }
	            }
	            $fileNumber++;
	        }

	        $filePath = 'upload/'.$folder.'/'.$filename;
	        $uploaddir = 'upload/'.$folder.'/';
	        if(!is_dir($uploaddir))
			{
				mkdir($uploaddir);
			}
			$mpdf->Output($filePath,'F');
	    }
	}
}
