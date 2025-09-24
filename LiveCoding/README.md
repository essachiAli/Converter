# Number Converter CLI

A PHP command-line tool for converting numbers between different bases (decimal, binary, hexadecimal) and performing bitwise operations.

## Features

- Convert numbers to decimal, binary, and hexadecimal formats
- Perform bitwise operations:
  - AND (`--and`)
  - OR (`--or`)
  - XOR (`--xor`)
  - NOT (`--not`)
  - Shift Left (`--shift-left`)
  - Shift Right (`--shift-right`)
- Clean, formatted output
- Support for both direct PHP execution and Composer scripts

## Requirements

- PHP 8.2 or higher
- Composer (for dependency management)

## Installation

1. Clone the repository:
```bash
git clone https://github.com/AZIZ-Soufiane/Converter.git
cd Converter/Prototype
```

2. Install dependencies:
```bash
composer install
```

## Usage

### Basic Conversion

Convert a number to all supported formats:

```bash
# Using PHP directly
php bin/converter.php 42

# Using Composer script
composer run convert 42

# Output:
# Decimal :42
# Binary  :101010
# Hexa    :2A
```

### Bitwise Operations

Perform bitwise operations along with conversion:

```bash
# Bitwise AND
php bin/converter.php 42 --and=15
# Output includes: AND :10

# Bitwise OR
php bin/converter.php 42 --or=7
# Output includes: OR :47

# Bitwise XOR
php bin/converter.php 42 --xor=3
# Output includes: XOR :41

# Bitwise NOT
php bin/converter.php 42 --not
# Output includes: NOT :-43

# Shift operations
php bin/converter.php 42 --shift-left=2
# Output includes: Shift Left:168

php bin/converter.php 42 --shift-right=1
# Output includes: Shift Right:21
```

### Multiple Operations

You can combine multiple bitwise operations in a single command:

```bash
php bin/converter.php 42 --and=15 --or=7 --xor=3 --not --shift-left=2 --shift-right=1

# Output:
# Decimal :42
# Binary  :101010
# Hexa    :2A
# AND     :10
# OR      :47
# XOR     :41
# NOT     :-43
# Shift Left:168
# Shift Right:21
```

### Using with Composer

When using the Composer script, use `--` to separate Composer arguments from script arguments:

```bash
composer run convert 42 -- --and=15 --or=7
```

## Examples

### Example 1: Basic Conversion
```bash
$ php bin/converter.php 255
Decimal :255
Binary  :11111111
Hexa    :FF
```

### Example 2: Bitwise AND Operation
```bash
$ php bin/converter.php 42 --and=15
Decimal :42
Binary  :101010
Hexa    :2A
AND     :10
```

### Example 3: Multiple Operations
```bash
$ php bin/converter.php 100 --and=50 --or=25 --shift-left=1
Decimal :100
Binary  :1100100
Hexa    :64
AND     :32
OR      :125
Shift Left:200
```

## Architecture

The project follows clean architecture principles:

- `bin/converter.php` - CLI entry point with argument parsing
- `src/NumberConverter.php` - Main converter class implementing business logic
- `src/ConverterInterface.php` - Interface defining conversion methods
- `src/FormatterTrait.php` - Trait for consistent output formatting

## Development

### Project Structure
```
Prototype/
├── bin/
│   └── converter.php       # CLI entry point
├── src/
│   ├── ConverterInterface.php
│   ├── FormatterTrait.php
│   └── NumberConverter.php
├── vendor/                 # Composer dependencies
├── composer.json
└── composer.lock
```

### Running Tests

The converter handles various edge cases and input validation. Test with different numbers and operation combinations to ensure reliability.

## Error Handling

The tool provides clear error messages for invalid inputs:

- Invalid or missing number arguments
- Non-numeric inputs
- Malformed command-line options

## License

This project is open source. Please refer to the license file for more information.

## Contributing

Contributions are welcome! Please ensure your code follows PSR-12 coding standards and includes appropriate error handling.