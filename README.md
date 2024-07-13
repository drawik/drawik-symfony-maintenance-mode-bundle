# Symfony Maintenance Mode Bundle #

This Bundle enables put symfony into maintenance mode.

Bundle is prepared for Symfony ver. 6 and 7.


### Installation

### Composer Require

To install this extension run `composer require drawik/symfony-maintenance-mode-bundle`

### Usage

- Enable maintenance mode: `bin/console maintenance:enable`
- Disable maintenance mode: `bin/console maintenance:disable`

### Configuration

You can configure some behavior of bundle.
- state of bundle (enabled/disabled) without removing bundle
- list of ip addresses that are allowed to access site despite enabled maintenance mode
- location of lock file (default: /tmp/maintenance_mode.lock)

Add to config/packages `maintenance_mode.yaml` file.

Example content:
```
maintenance_mode:
    maintenance_config:
        enabled: 1
        allowed_ips: [ '127.0.0.1', '172.20.0.11' ]
        lock_file_path: /tmp/maintenance_mode.lock
```
