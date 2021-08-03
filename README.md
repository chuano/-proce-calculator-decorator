# Decorator pattern example for a price calculator

Academic purpouse price calculator using the decorator pattern.

[comment]: <> (Spanish post in [Patrón decorador en PHP]&#40;https://chuano.dev/patron-decorador-php/&#41;)

[comment]: <> (Implemented tests for these cases:)

[comment]: <> (- Return 15% of discount given more than 300€ amount and more than 50 units.)

[comment]: <> (- Return 12% of discount given less or equal than 300€ amount and more than 50 units.)

[comment]: <> (- Return 10% of discount given any amount, more than 30 units and less or equal 50 units.)

[comment]: <> (- Return 5% of discount given more than 100€ amount and less or equal 30 units.)

[comment]: <> (- Return 0% else.)

## Execute tests
```bash
./vendor/bin/phpunit tests
```
