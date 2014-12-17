<?php
class Tasks_globals extends Tasks
{

	public function getContent()
	{
		$url = URL::assemble(Config::getSiteRoot(), $this->fetchConfig('globals_url', null, null, false, false));
		$content = ContentService::getContentByUrl($url);
		$content = current($content->extract());

		return $content;
	}


	public function getFilename()
	{
		$content = $this->getContent();
		$file = pathinfo($content['_file']);

		return $file['filename'];
	}

}
