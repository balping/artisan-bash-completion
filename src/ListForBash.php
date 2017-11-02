<?php

/*
	This file is originally the work of
	Russel Waters (https://github.com/argakiig) and
	Jan Hansen (https://github.com/janka)

	They haven't specified any license for
	ther works, so
	GPL 3.0 does not apply to this file!

 */

namespace Balping\ArtisanBashCompletion;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ListForBash extends Command {

  /**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'list:forBash';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Lists commands for bash completion.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$commandTyped = $this->argument('commandTyped');

		$allCommands = array_keys($this->getApplication()->all());
		
		if ($commandTyped) {
			$colonAt = strpos($commandTyped, ':');
			$possibleCommands = [];
			foreach ($allCommands as $command ) {
				// Return command in result if it starts with $commandTyped
				if (strpos($command, $commandTyped) === 0) {
					// Colons acts as separators in bash, so return only second part if colon is in commandTyped.
					$possibleCommands[] = $colonAt ? substr($command, $colonAt+1) : $command;
				}
			}
		} else {
			// Nothing typed, return all
			$possibleCommands = $allCommands;
		}

		echo implode(' ', $possibleCommands);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['artisan', InputArgument::OPTIONAL, '"artisan"'],
			['commandTyped', InputArgument::OPTIONAL, 'The (partial) artisan command'],
		];
	}
}
