<?php
class Tasks_globals extends Tasks
{

	public function getContent()
	{
		$url = $this->fetchConfig('globals_url', null, null, false, false);
		$content = ContentService::getContentByUrl($url);
		$content = current($content->extract());

		return $content;
	}

}