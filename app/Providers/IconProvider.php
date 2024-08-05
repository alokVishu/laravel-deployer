<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentIcon;

class IconProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    FilamentIcon::register([
      // Panel Builder icon aliases
      'panels::global-search.field' => 'tabler-search',
      'panels::pages.dashboard.actions.filter' => 'tabler-filter',
      'panels::pages.dashboard.navigation-item' => 'tabler-dashboard',
      'panels::pages.password-reset.request-password-reset.actions.login' => 'tabler-login',
      'panels::pages.password-reset.request-password-reset.actions.login.rtl' => 'tabler-login',
      'panels::resources.pages.edit-record.navigation-item' => 'tabler-layout-list',
      'panels::resources.pages.manage-related-records.navigation-item' => 'tabler-layout-list',
      'panels::resources.pages.view-record.navigation-item' => 'tabler-layout-list',
      'panels::sidebar.collapse-button' => 'tabler-layout-sidebar',
      'panels::sidebar.collapse-button.rtl' => 'tabler-layout-sidebar',
      'panels::sidebar.expand-button' => 'tabler-layout-sidebar',
      'panels::sidebar.expand-button.rtl' => 'tabler-layout-sidebar',
      'panels::sidebar.group.collapse-button' => 'tabler-chevron-up',
      'panels::tenant-menu.billing-button' => 'tabler-credit-card',
      'panels::tenant-menu.profile-button' => 'tabler-user',
      'panels::tenant-menu.registration-button' => 'tabler-user-plus',
      'panels::tenant-menu.toggle-button' => 'tabler-menu-2',
      'panels::theme-switcher.light-button' => 'tabler-sun',
      'panels::theme-switcher.dark-button' => 'tabler-moon',
      'panels::theme-switcher.system-button' => 'tabler-device-laptop',
      'panels::topbar.close-sidebar-button' => 'tabler-x',
      'panels::topbar.open-sidebar-button' => 'tabler-menu-2',
      'panels::topbar.group.toggle-button' => 'tabler-chevron-down',
      'panels::topbar.open-database-notifications-button' => 'tabler-bell',
      'panels::user-menu.profile-item' => 'tabler-user',
      'panels::user-menu.logout-button' => 'tabler-logout',
      'panels::widgets.account.logout-button' => 'tabler-logout',
      'panels::widgets.filament-info.open-documentation-button' => 'tabler-book',
      'panels::widgets.filament-info.open-github-button' => 'tabler-brand-github',

      // Form Builder icon aliases
      'forms::components.builder.actions.clone' => 'tabler-copy',
      'forms::components.builder.actions.collapse' => 'tabler-chevron-down',
      'forms::components.builder.actions.delete' => 'tabler-trash',
      'forms::components.builder.actions.expand' => 'tabler-chevron-up',
      'forms::components.builder.actions.move-down' => 'tabler-arrow-down',
      'forms::components.builder.actions.move-up' => 'tabler-arrow-up',
      'forms::components.builder.actions.reorder' => 'tabler-drag-drop',
      'forms::components.checkbox-list.search-field' => 'tabler-search',
      'forms::components.file-upload.editor.actions.drag-crop' => 'tabler-crop',
      'forms::components.file-upload.editor.actions.drag-move' => 'tabler-drag-drop',
      'forms::components.file-upload.editor.actions.flip-horizontal' => 'tabler-flip-horizontal',
      'forms::components.file-upload.editor.actions.flip-vertical' => 'tabler-flip-vertical',
      'forms::components.file-upload.editor.actions.move-down' => 'tabler-arrow-down',
      'forms::components.file-upload.editor.actions.move-left' => 'tabler-arrow-left',
      'forms::components.file-upload.editor.actions.move-right' => 'tabler-arrow-right',
      'forms::components.file-upload.editor.actions.move-up' => 'tabler-arrow-up',
      'forms::components.file-upload.editor.actions.rotate-left' => 'tabler-rotate',
      'forms::components.file-upload.editor.actions.rotate-right' => 'tabler-rotate-clockwise',
      'forms::components.file-upload.editor.actions.zoom-100' => 'tabler-zoom-in-area',
      'forms::components.file-upload.editor.actions.zoom-in' => 'tabler-zoom-in',
      'forms::components.file-upload.editor.actions.zoom-out' => 'tabler-zoom-out',
      'forms::components.key-value.actions.delete' => 'tabler-trash',
      'forms::components.key-value.actions.reorder' => 'tabler-drag-drop',
      'forms::components.repeater.actions.clone' => 'tabler-copy',
      'forms::components.repeater.actions.collapse' => 'tabler-chevron-down',
      'forms::components.repeater.actions.delete' => 'tabler-trash',
      'forms::components.repeater.actions.expand' => 'tabler-chevron-up',
      'forms::components.repeater.actions.move-down' => 'tabler-arrow-down',
      'forms::components.repeater.actions.move-up' => 'tabler-arrow-up',
      'forms::components.repeater.actions.reorder' => 'tabler-drag-drop',
      'forms::components.select.actions.create-option' => 'tabler-plus',
      'forms::components.select.actions.edit-option' => 'tabler-edit',
      'forms::components.text-input.actions.hide-password' => 'tabler-eye-off',
      'forms::components.text-input.actions.show-password' => 'tabler-eye',
      'forms::components.toggle-buttons.boolean.false' => 'tabler-x',
      'forms::components.toggle-buttons.boolean.true' => 'tabler-check',
      'forms::components.wizard.completed-step' => 'tabler-check',

      // Table Builder icon aliases
      'tables::actions.disable-reordering' => 'tabler-drag-drop',
      'tables::actions.enable-reordering' => 'tabler-drag-drop',
      'tables::actions.filter' => 'tabler-filter',
      'tables::actions.group' => 'tabler-circuit-ground',
      'tables::actions.open-bulk-actions' => 'tabler-checkbox',
      'tables::actions.toggle-columns' => 'tabler-columns-3',
      'tables::columns.collapse-button' => 'tabler-chevron-down',
      'tables::columns.icon-column.false' => 'tabler-x',
      'tables::columns.icon-column.true' => 'tabler-check',
      'tables::empty-state' => 'tabler-hourglass-empty',
      'tables::filters.query-builder.constraints.boolean' => 'tabler-toggle-right',
      'tables::filters.query-builder.constraints.date' => 'tabler-calendar',
      'tables::filters.query-builder.constraints.number' => 'tabler-hash',
      'tables::filters.query-builder.constraints.relationship' => 'tabler-link',
      'tables::filters.query-builder.constraints.select' => 'tabler-list',
      'tables::filters.query-builder.constraints.text' => 'tabler-typography',
      'tables::filters.remove-all-button' => 'tabler-x',
      'tables::grouping.collapse-button' => 'tabler-chevron-down',
      'tables::header-cell.sort-asc-button' => 'tabler-arrow-up',
      'tables::header-cell.sort-desc-button' => 'tabler-arrow-down',
      'tables::reorder.handle' => 'tabler-drag-drop',
      'tables::search-field' => 'tabler-search',

      // Notifications icon aliases
      'notifications::database.modal.empty-state' => 'tabler-hourglass-empty',
      'notifications::notification.close-button' => 'tabler-x',
      'notifications::notification.danger' => 'tabler-alert-triangle',
      'notifications::notification.info' => 'tabler-info',
      'notifications::notification.success' => 'tabler-check',
      'notifications::notification.warning' => 'tabler-alert-circle',

      // Actions icon aliases
      'actions::action-group' => 'tabler-circuit-ground',
      'actions::create-action.grouped' => 'tabler-plus',
      'actions::delete-action' => 'tabler-trash',
      'actions::delete-action.grouped' => 'tabler-circuit-ground',
      'actions::delete-action.modal' => 'tabler-box-model',
      'actions::detach-action' => 'tabler-link-off',
      'actions::detach-action.modal' => 'tabler-box-model',
      'actions::dissociate-action' => 'tabler-link-off',
      'actions::dissociate-action.modal' => 'tabler-box-model',
      'actions::edit-action' => 'tabler-edit',
      'actions::edit-action.grouped' => 'tabler-circuit-ground',
      'actions::export-action.grouped' => 'tabler-download',
      'actions::force-delete-action' => 'tabler-trash',
      'actions::force-delete-action.grouped' => 'tabler-circuit-ground',
      'actions::force-delete-action.modal' => 'tabler-box-model',
      'actions::import-action.grouped' => 'tabler-upload',
      'actions::modal.confirmation' => 'tabler-box-model',
      'actions::replicate-action' => 'tabler-copy',
      'actions::replicate-action.grouped' => 'tabler-circuit-ground',
      'actions::restore-action' => 'tabler-refresh',
      'actions::restore-action.grouped' => 'tabler-circuit-ground',
      'actions::restore-action.modal' => 'tabler-box-model',
      'actions::view-action' => 'tabler-eye',
      'actions::view-action.grouped' => 'tabler-circuit-ground',

      // Infolist Builder icon aliases
      'infolists::components.icon-entry.false' => 'tabler-x',
      'infolists::components.icon-entry.true' => 'tabler-check',

      // UI components icon aliases
      'badge.delete-button' => 'tabler-x',
      'breadcrumbs.separator' => 'tabler-chevron-right',
      'breadcrumbs.separator.rtl' => 'tabler-chevron-left',
      'modal.close-button' => 'tabler-x',
      'pagination.first-button' => 'tabler-chevrons-left',
      'pagination.first-button.rtl' => 'tabler-chevrons-right',
      'pagination.last-button' => 'tabler-chevrons-right',
      'pagination.last-button.rtl' => 'tabler-chevrons-left',
      'pagination.next-button' => 'tabler-chevron-right',
      'pagination.next-button.rtl' => 'tabler-chevron-left',
      'pagination.previous-button' => 'tabler-chevron-left',
      'pagination.previous-button.rtl' => 'tabler-chevron-right',
      'section.collapse-button' => 'tabler-chevron-down',
    ]);
  }
}
