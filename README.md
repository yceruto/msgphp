# MsgPhp

Main development repository.

[![Build Status](https://travis-ci.org/msgphp/msgphp.svg?branch=master)](https://travis-ci.org/msgphp/msgphp) [![codecov](https://codecov.io/gh/msgphp/msgphp/branch/master/graph/badge.svg)](https://codecov.io/gh/msgphp/msgphp)

## Sub repositoriies

Component | Bundle
--- | ---
[`msgphp/domain`](https://github.com/msgphp/domain) | n/a
[`msgphp/eav`](https://github.com/msgphp/eav) | [`msgphp/eav-bundle`](https://github.com/msgphp/eav-bundle)
[`msgphp/user`](https://github.com/msgphp/user) | [`msgphp/user-bundle`](https://github.com/msgphp/user-bundle)

## Blog posts

- [Building a new Symfony User Bundle](https://medium.com/@ro0NL/building-a-new-symfony-user-bundle-b4fe5a9d9d80)

## Contributing

### Setup environment

Run the following command to setup your environment first:

```bash
bin/setup
```

### Testing

Run tests for all components:

```bash
bin/phpunit
```

Run tests for a single component, e.g. `Domain`:

```bash
cd src/Domain/
vendor/bin/simple-phpunit
```

### Code style

Analyze all components:

```bash
bin/cs
```

Analyze a single component, e.g. `Domain`:

```bash
bin/cs src/Domain/
```

### Static analysis

Analyze all components:

```bash
bin/sa
```

Analyze a single component, e.g. `Domain`:

```bash
bin/sa src/Domain/
```

### Helping others

To checkout another open pull request from this repository use:

```bash
bin/pr <pr-number>
```

It will add a new git remote `github-pr-XXX` pointing to the author's SSH URL and checkout their branch locally using the same name.
