<?php
namespace BL00B1RD\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

use BL00B1RD\Model\Articles;
use BL00B1RD\Model\Pages;

/**
 * Class HomepageController
 * @package BL00B1RD\Controller
 */
class HomepageController extends AbstractController
{
    public function home(Request $request, Response $response, $args)
    {
		//List all articles at this point
		//$posts = Articles::orderBy('timestamp', 'desc')->get(); 
		$body = $this->view->fetch('blog_home.html');

        return $response->write($body);
    }
	
	/*public function pages(Request $request, Response $response, $args)
    {
		$pages = New Pages;
		//$pages = Pages::where('slug', '=', $page)->get();
		$page = $request->getAttribute('page');
		
		$pages = Pages::find($page);
		$navigation = listPages('all');
		if (! $pages instanceof Pages) {
			$msg = "not found";
			$body = $this->view->fetch('not_found.html', array('noFind' => $msg, 'nav' => $navigation));
		}else{
			$body = $this->view->fetch('pages.html', array('page_det' => $pages, 'nav' => $navigation));
		}
		
		return $response->write($body);
	}
	
	public function posts(Request $request, Response $response, $args)
    {
		$post = Articles::find($id);
		$navigation = listPages('all');

		if (! $post instanceof Articles) {
			$msg = "not found";
			$body = $this->view->fetch('not_found.html', array('noFind' => $msg, 'nav' => $navigation));
		}else{
		   $body = $this->view->fetch('blog_detail.html', 
				array(
				'ind_posts' => $post,
				'nav' => $navigation,
				'tagline' => BLOG_TAGLINE,
				'title' => BLOG_TITLE
				));
		}
			
		return $response->write($body);
	}*/
}

