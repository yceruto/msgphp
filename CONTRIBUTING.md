# Contributing

## Setup environment

Run the following command to setup your environment first:

```bash
bin/setup
```

## Testing

Run tests for all components:

```bash
bin/phpunit
```

Run tests for a single component, e.g. `Domain`:

```bash
cd src/Domain/
vendor/bin/simple-phpunit
```

## Code style

Analyze all components:

```bash
bin/cs
```

Analyze a single component, e.g. `Domain`:

```bash
bin/cs src/Domain/
```

## Static analysis

Analyze all components:

```bash
bin/sa
```

Analyze a single component, e.g. `Domain`:

```bash
bin/sa src/Domain/
```

## Helping others

To checkout another open pull request from this repository use:

```bash
bin/pr <pr-number>
```

It will add a new git remote `github-pr-XXX` pointing to the author's SSH URL and checkout their branch locally using the same name.
