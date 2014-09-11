<?php
class Plugin_globals extends Plugin
{

	public function __call($method, $args)
	{
		// Get content
		if ( ! $content = $this->blink->get('content'))
		{
			$content = $this->tasks->getContent();
			$this->blink->set('content', $content);
		}

		// Check for no existence and return fallback
		if ( ! $val = array_get($content, $method))
		{
			return $this->fetchParam(array('fallback', 'or'), false, null, null, false);
		}

		return $val;
	}

}
