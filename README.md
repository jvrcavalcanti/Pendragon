# Pendragon Framework

Lincense MIT

## Create Project

```bash
composer create-project pendragon/framework {directory}
```

## Install Dependencies

```bash
composer install
```

## Start
```bash
copy .env.example .env
composer make.key
```

## Scripts

### Serve
```bash
composer serve
```

### Migrate
```bash
composer migrate
```

### Migrate Rollback
```bash
composer migrate.rollback
```

### Migrate Refresh
```bash
composer migrate.refresh
```

### Clear Images
```bash
composer clear.images
```

### Tests
```bash
composer test
```

### Make Migration
```bash
composer make.migration {name}
```

### Make Model
```bash
composer make.model {name}
```

### Make Controller
```bash
composer make.controller {name}
```

### Make Middleware
```bash
composer make.middleware {name}
```

### Make View
```bash
composer make.view {name}
```

### Make Component
```bash
composer make.component {name}
```

