# Number Converter CLI

A PHP command-line tool for converting numbers to decimal and binary formats, performing bitwise operations, and optionally outputting results in JSON.

## Features

- Convert numbers to decimal and binary
- Perform bitwise operations:
  - AND
  - OR
  - XOR
  - NOT
- Normal terminal output or JSON output for automated scripts
- Works directly with PHP or via Composer scripts
- Composer script clears previous JSON output automatically

## Requirements

- PHP 8.2 or higher
- Composer (for dependency management)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/essachiAli/Converter
cd Converter/Realisation
```

2. Install dependencies:

```bash
composer install
```

## Quick Start

### Direct PHP execution (terminal output):

```bash
php bin/calc.php 3 4
```

### Composer script (JSON output):

```bash
composer run convert
```

### JSON output manually:

```bash
php bin/calc.php 3 4 --json > samples/output.json
```

## Usage

### Terminal Output

```bash
php bin/calc.php 3 4
```

# Example output:
# Input A : 3 (11)
# Input B : 4 (100)
# A AND B : 0 (0)
# A OR B  : 7 (111)
# A XOR B : 7 (111)
# NOT A   : -4 (...)
# NOT B   : -5 (...)
```

### JSON Output

```bash
php bin/calc.php 3 4 --json > samples/output.json
```

# Example content of samples/output.json:
# [
#   "Input A : 3 (11)",
#   "Input B : 4 (100)",
#   "A AND B : 0 (0)",
#   "A OR B  : 7 (111)",
#   "A XOR B : 7 (111)",
#   "NOT A   : -4 (...)",
#   "NOT B   : -5 (...)"
# ]
```

## Composer Script

The Composer "convert" script:

- Clears previous samples/output.json
- Reads numbers from samples/input.txt
- Runs the converter in JSON mode
- Saves output to samples/output.json

Run:

```bash
composer run convert
```

### Example samples/input.txt

```
3 4
```

### Example samples/output.json

```json
[
  "Input A : 3 (11)",
  "Input B : 4 (100)",
  "A AND B : 0 (0)",
  "A OR B  : 7 (111)",
  "A XOR B : 7 (111)",
  "NOT A   : -4 (...)",
  "NOT B   : -5 (...)"
]
```

## Architecture

- `bin/calc.php` — CLI entry point with argument parsing
- `src/NumberConverter.php` — Core converter class handling operations
- `src/ConverterInterface.php` — Interface defining conversion methods
- `src/FormatterTrait.php` — Trait for consistent line formatting

## Project Structure

```
Realisation/
├── bin/
│   └── calc.php
├── src/
│   ├── ConverterInterface.php
│   ├── FormatterTrait.php
│   └── NumberConverter.php
├── samples/
│   ├── input.txt
│   └── output.json
├── vendor/                 # Composer dependencies
├── composer.json
└── composer.lock
```

## Development

- Test with different numbers to ensure correctness
- Supports both terminal and JSON output
- Handles invalid input gracefully
- Follow PSR-12 coding standards

## Error Handling

Clear error messages are displayed for:

- Missing or invalid number arguments
- Non-numeric inputs
- Improper command-line options

## License

Open-source project. See the license file for details.