<?php
class Hooks_globals extends Hooks
{

	public function control_panel__add_routes()
	{
		$app = \Slim\Slim::getInstance();
		$tasks = $this->tasks;

		$app->get('/globals', function() use ($tasks, $app) {
			$content = $tasks->getContent();
			$file = pathinfo($content['_file']);
			$url = 'publish?path=' . $file['filename'];
			$app->redirect($url, 302);
		})->name('globals');
	}

}