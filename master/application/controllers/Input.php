
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller {

	private function tostring($data)
	{
		$j = [];
		foreach ($data as $i) {
			array_push($j, implode(" ", $i));
		}
		return implode(',', $j);
	}

	private function tostringservice($data)
	{
		$j = [];
		foreach ($data as $i) {
			array_push($j, implode("...", $i));
		}
		return implode(',,,', $j);
	}

	private function public_command($name)
	{
		$public_command = $this->db->get_where('public_command',['name' => $name])->row_array();
		return $public_command;
	}

	private function updatecommand($name)
	{
		$get = $this->db->get_where('public_command',['name'=>$name])->row_array()['service_list'];
		$raw = [];
		foreach (explode(',,,', $get) as $key) {
			$key = explode('...', $key);
			$key = $key[0].'...'.$key[1].'...1';
			array_push($raw, $key);
		}
		$data = [
			'service_list' => implode(',,,', $raw)
		];
		$this->db->where('name',$name);
		$this->db->update('public_command',$data);
	}

	public function publik()
	{
		$raw = file_get_contents('php://input');
		try {
			$parsing = json_decode(trim($raw), true);
			$data = [
				'name' => htmlspecialchars($parsing['name']),
				'ip' => htmlspecialchars(implode(",", $parsing["ip"])),
				'date' => htmlspecialchars($parsing['date']),
				'target' => htmlspecialchars($parsing['target']),
				'disk' => htmlspecialchars(implode(",", [$parsing["disk"]["storage"],$parsing["disk"]["percent"]])),
				"ram" => htmlspecialchars(implode(",", [$parsing["ram"]["storage"],$parsing["ram"]["percent"]])),
				'port' => htmlspecialchars($this->tostring($parsing['port'])),
				'ssh_live' => htmlspecialchars($this->tostring($parsing['ssh_live'])),
				'ssh_failed' => htmlspecialchars($this->tostring($parsing['ssh_failed'])),
				'ssh_success' => htmlspecialchars($this->tostring($parsing['ssh_success'])),
				'service_list' => htmlspecialchars($this->tostringservice($parsing['service_list']))
			];
			$dbvalidation = $this->db->get_where('name_reg', ['name'=>$data['name']])->row_array();
			$dbcheck = $this->db->get_where('public', ['name'=>$data['name']])->row_array();
			if ($data['name']==$dbvalidation['name']) {
				if ($data['name']==$dbcheck['name']) {
					$this->db->where('name',$data['name']);
					$this->db->update('public',$data);	
					$response = $this->public_command($dbcheck['name']);
					echo '{"name":"'.$response['name'].'","reboot":"'.$response['reboot'].'","service_list":"'.$response['service_list'].'"}';
				} else {
					$this->db->insert('public',$data);
					echo '{"name":"'.$response['name'].'","reboot":"'.$response['reboot'].'","service_list":"'.$response['service_list'].'"}';
				}
			} else {
				echo '{"error":"not reg"}';
				// $this->db->insert('public',$data);
			}
		
		} catch (Exception $e) {
		    // echo 'Caught exception: ',  $e->getMessage(), "\n";
			echo '{"error":"raw","data":"'.$raw.'"}';
		}
		// var_dump($parsing['port']);
	}

	public function publik_command()
	{
		$raw1 = file_get_contents('php://input');
		$data = json_decode(trim($raw1), True);
		$dbvalidation = $this->db->get_where('name_reg', ['name'=>$data['name']])->row_array();
		$this->updatecommand($dbvalidation['name']);
	}
}
