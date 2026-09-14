# Changelog

## v5.0.0

- Support Filament v5 and Laravel 12 / 13 (Livewire 4, PHP 8.2+).
- Require `lara-zeus/spatie-translatable` explicitly (used by the plugin and the locale switcher).
- `TypeActions::register()`, `TypeHeaderActions::register()` and `TypeBulkActions::register()` accept `Filament\Actions\Action` / `BulkAction` (the old `Filament\Tables\Actions\*` classes no longer exist).
- The type filter uses the v5 `schema()` API.
- Extend the Pest test suite with resource hook tests.
