<?php define('IS_DEV', true); // Change to false in production

function log_to_console($message, $type = 'log') {
		if (!IS_DEV) return;
		if (!in_array($type, ['log', 'info', 'warn', 'error'])) { $type = 'log'; }
		$js_message = json_encode($message, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
		echo "<script>console.{$type}({$js_message});</script>";
}

function setup_console_logging() {
		if (!IS_DEV) return;
		set_error_handler(function($errno, $errstr, $errfile, $errline) {
				$msg = "PHP Error [$errno]: $errstr in $errfile on line $errline";
				log_to_console($msg, 'error');
				return true;
		});

		set_exception_handler(function($e) {
				$msg = "Uncaught Exception: " . $e->getMessage() .
							 " in " . $e->getFile() . " on line " . $e->getLine();
				log_to_console($msg, 'error');
				exit;
		});

		register_shutdown_function(function() {
				$error = error_get_last();
				if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
						$msg = "Fatal Error: {$error['message']} in {$error['file']} on line {$error['line']}";
						log_to_console($msg, 'error');
				}
		});
}
setup_console_logging();
// undefined_function(); // triggers a logged error
// throw new Exception("Test Exception"); // triggers exception logging
// log_to_console("This is a debug message");
// log_to_console("Something went wrong", 'error');
// log_to_console(["status" => "ok", "count" => 3], 'info');


	$dbocon = 'mysql:host=db5017971421.hosting-data.io;dbname=dbs14293873;charset=utf8mb4';
	$dbuser = 'dbu5419085';
	$dbpass = '$JW$Cruises@com!';
	$dbhost = 'db5017971421.hosting-data.io';
	$dbname = 'dbs14293873';

	$dbx = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	$options = [	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
								PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
								PDO::ATTR_EMULATE_PREPARES=>false ];
	$pdo = new PDO($dbocon,$dbuser,$dbpass,$options);


function randomFromSet(array $values): int {
		return $values[array_rand($values)];
}

	class AdvSysDir extends ArrayIterator
	{
			public function __construct(string $path, int $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS) {
					$files = new FilesystemIterator($path, $flags);
					parent::__construct(iterator_to_array($files));
			}

			public function __call(string $methodName, array $args) {
					if (preg_match('/^sortBy(.+)/', $methodName, $matches)) {
							$propertyMethod = 'get' . $matches[1];
							return $this->sort($propertyMethod);
					}
					throw new BadMethodCallException("Method {$methodName} does not exist.");
			}

			public function sort(string $propertyMethod): static {
					if (!method_exists(SplFileInfo::class, $propertyMethod)) {
							throw new InvalidArgumentException(sprintf(
									'Method "%s" does not exist in SplFileInfo.',
									$propertyMethod
							));
					}
					$this->uasort(function (SplFileInfo $fileA, SplFileInfo $fileB) use ($propertyMethod) {
							$valueA = $fileA->$propertyMethod();
							$valueB = $fileB->$propertyMethod();
							if (is_string($valueA) && is_string($valueB)) { return strnatcmp($valueA, $valueB); }
							return $valueB <=> $valueA;
					});
					return $this;
			}

			/**
			* Limits the result set to a subset, similar to SQL LIMIT.
			* @param int $offset Starting index (0-based).
			* @param int $count  Number of items to return. -1 means no limit.
			*/
			public function limit(int $offset = 0, int $count = -1): static {
					$limited = new LimitIterator($this, $offset, $count);
					parent::__construct(iterator_to_array($limited));
					return $this;
			}

			/**
			* Filters the files by a regular expression.
			* @param string $regex     The regex pattern to match against each file (by default, full path).
			* @param int    $mode      One of RegexIterator modes (MATCH by default).
			* @param int    $flags     RegexIterator flags (e.g., GET_MATCH).
			* @param int    $pregFlags Flags for the regex itself (e.g., PREG_OFFSET_CAPTURE).
			*/
			public function match(string $regex, int $mode = RegexIterator::MATCH, int $flags = 0, int $pregFlags = 0): static {
					$filtered = new RegexIterator($this, $regex, $mode, $flags, $pregFlags);
					parent::__construct(iterator_to_array($filtered));
					return $this;
			}
	}



	function generateEventCalendars(string $start_date, string $end_date): string {
			$output = '';
			$start = new DateTime($start_date);
			$end = new DateTime($end_date);
			$months = [];
			$period = new DatePeriod(
					(clone $start)->modify('first day of this month'),
					new DateInterval('P1M'),
					(clone $end)->modify('first day of next month')
			);
			foreach ($period as $dt) {
					$months[] = [
							'year' => (int)$dt->format('Y'),
							'month' => (int)$dt->format('n')
					];
			}
			foreach ($months as $m) {
					$output .= buildCalendarMonth($m['year'], $m['month'], $start, $end);
			}
			return $output;
	}

	function buildCalendarMonth(int $year, int $month, DateTime $start, DateTime $end): string {
			$output = '';
			$first_day = new DateTime("$year-$month-01");
			$total_days = (int)$first_day->format('t');
			$start_weekday = (int)$first_day->format('w');
			$event_days = [];
			$period = new DatePeriod( (clone $start), new DateInterval('P1D'), (clone $end)->modify('+1 day') );
			foreach ($period as $date) { if ((int)$date->format('Y') === $year && (int)$date->format('n') === $month) { $event_days[] = (int)$date->format('j'); } }
			$prev_month = (clone $first_day)->modify('-1 month');
			$prev_days = (int)$prev_month->format('t');
			$output .= '<div class="event-calendar">';
			$output .= '<div class="calendar-header"><h4>' . $first_day->format('F Y') . '</h4></div>';
			$output .= '<div class="calendar-body">';
			$output .= '<div class="weekdays">';
			foreach (['Su','Mo','Tu','We','Th','Fr','Sa'] as $wd) { $output .= "<div>$wd</div>"; }
			$output .= '</div><div class="days">';
			for ($i = $start_weekday - 1; $i >= 0; $i--) { $output .= '<div class="day other-month">' . ($prev_days - $i) . '</div>'; }
			for ($d = 1; $d <= $total_days; $d++) { $class = 'day'; if (in_array($d, $event_days)) { $class .= ' has-event'; } $output .= "<div class=\"$class\">$d</div>"; }
			$total_cells = $start_weekday + $total_days;
			$next_fill = (7 - ($total_cells % 7)) % 7;
			for ($i = 1; $i <= $next_fill; $i++) { $output .= "<div class=\"day other-month\">$i</div>"; }
			$output .= '</div></div></div>'; // days, body, calendar
			return $output;
	}

	// Example usage
	// $start = '2025-10-26 00:00:00';
	// $end = '2025-11-03 00:00:00';
	// echo generateEventCalendars($start, $end);




	function fetchOne(PDO $pdo, string $sql, array $params): array|false {
		$stmt = $pdo->prepare($sql);
		$stmt->execute($params);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	function getItineraries(PDO $pdo, int $id): array {
			$stmt = $pdo->prepare(
					'SELECT *
					 FROM itineraries
					 WHERE itinerary_id = ?
					 ORDER BY arriving_date ASC'
			);
			return $stmt->execute([ $id ])
					? $stmt->fetchAll()
					: [];
	}

	$company=$dbx->query('SELECT * FROM company_info')->fetch_assoc();
	$cruise_menu = $dbx->query("SELECT cruise_id cd, cruise_name cn, departing_date dd FROM cruises WHERE active ORDER BY dd");
	$featured_cruises = $dbx->query("SELECT * FROM cruises WHERE active AND featured ORDER BY departing_date ASC LIMIT 5");
	// shuffle($featured_cruises);
	$all_cruises = $dbx->query("SELECT * FROM cruises WHERE active ORDER BY departing_date ASC");

	// $featuredc = $db->query("SELECT *, cruise_name cn, ship_name cs, cruise_duration cd FROM cruises WHERE active AND featured ORDER BY departing_date ASC LIMIT 5");

	$cruise_names = $ship_names = $cruise_durations = [];
	foreach ($all_cruises as $cruise) {
			if (!in_array($cruise['cruise_name'], $cruise_names)) $cruise_names[] = $cruise['cruise_name'];
			if (!in_array($cruise['ship_name'], $ship_names)) $ship_names[] = $cruise['ship_name'];
			if (!in_array($cruise['cruise_duration'], $cruise_durations)) $cruise_durations[] = $cruise['cruise_duration'];
	}


function formatLongDate(string $datetime): string {
	try { $date = new DateTime($datetime); return $date->format('F j, Y');
	} catch (Exception $e) { return ''; }
}


?>
