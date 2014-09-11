<?php
class Hooks_globals extends Hooks
{

	public function control_panel__add_routes()
	{
		$app = \Slim\Slim::getInstance();
		$tasks = $this->tasks;

		$app->get('/globals', function() use ($tasks, $app) {
			$url = 'publish?path=' . $tasks->getFilename();
			$app->redirect($url, 302);
		})->name('globals');
	}


	public function control_panel__add_to_foot()
	{
		if (
			URL::getCurrent() == '/publish'
			&& Request::get('path') == $this->tasks->getFilename()
		) {
			return $this->js->inline('
				$(".input-block").first().hide();
				$(".status-block")
					.html("<span class=\'folder\'>' . Localization::fetch('editing_globals') . '</span>")
					.next().find("li").first().hide();
				$("#item-content a").removeClass("active");
				$("#item-globals a").addClass("active");
			');
		}
	}

}