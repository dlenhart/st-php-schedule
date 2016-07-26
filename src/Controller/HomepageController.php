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
}

