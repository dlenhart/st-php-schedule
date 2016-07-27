<?php
namespace stphpschedule\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

use stphpschedule\Model\Jobs;
use stphpschedule\Model\Queue;

/**
 * Class HomepageController
 * @package stphpschedule\Controller
 */
class HomepageController extends AbstractController
{
	public function home(Request $request, Response $response, $args)
	{
		$body = $this->view->fetch('home_interface.html');
		return $response->write($body);
	}
	
	public function queue(Request $request, Response $response, $args)
	{
		$que = New Queue;
		$que = Queue::all();
		$body = $this->view->fetch('home_queue.html', array('qItems' => $que));
		return $response->write($body);
	}
	
	public function job(Request $request, Response $response, $args)
	{
		$job = New Jobs;
		$job = Jobs::all();
		$body = $this->view->fetch('home_job.html', array('jItems' => $job));
		return $response->write($body);
	}
	
	public function postQueue(Request $request, Response $response, $args)
	{
		$allVars = (array)$request->getParsedBody();
		$que = New Queue;
		$time = time();
		
		$que->job_id = $allVars['jobid'];
		$que->path = $allVars['path'];
		$que->hold = $allVars['hold'];
		
		$que->in_que_time = $time;

		$que->save();

		$data = '{"Success": "' . $que->id . '"}';
		$response->write($data);
		$response = $response->withHeader(
			'Content-Type', 'application/json');
	   return $response;
	}
	
	public function holdJob(Request $request, Response $response, $args)
	{
		$allVars = (array)$request->getParsedBody();
		$que = New Queue;
		$id = $allVars['jobnum'];
		$holdflag = $allVars['hflag'];
		$que = Queue::find($id);
		$que->hold = $holdflag;
		$que->save();

		$data = '{"Success": "' . $que->id . '"}';
		$response->write($data);
		$response = $response->withHeader(
			'Content-Type', 'application/json');
	   return $response;
	}
	
	public function deleteJobq(Request $request, Response $response, $args)
	{
		$allVars = (array)$request->getParsedBody();
		$que = New Queue;
		$id = $allVars['jobnum'];
		$que = Queue::find($id);
		$que->delete();

		$data = '{"Success": "' . $que->id . '"}';
		$response->write($data);
		$response = $response->withHeader(
			'Content-Type', 'application/json');
	   return $response;
	}
}

