<?php

namespace App\Providers;

use App\Nova\User;
use Laravel\Nova\Nova;
use Illuminate\Http\Request;
use App\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Laravel\Nova\Actions\ActionEvent;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        ActionEvent::saving(function ($actionEvent) {
            return false;
        });

        Nova::userTimezone(function (Request $request) {
            return 'America/Argentina/Buenos_Aires';
        });

        // Nova::withoutThemeSwitcher();
        Nova::withoutNotificationCenter();

        Nova::footer(function ($request) {
          return Blade::render('<footer class="main-footer" style="max-height: 100px;text-align: center">
          <strong>Copyright © 2023
            <a href="https://www.argentina.gob.ar/policia-aeroportuaria" target="_blank"> Polic&iacute;a de Seguridad Aeroportuaria</a>
          </strong>
          <div class="lineaFooter top"></div>
          <a href="https://goo.gl/maps/HXp2XGqaNMv" target="_blank" class="a" data-original-title="" title="">
            Autopista Tte. Gral. Richieri Km 25 CP 1802 - Ezeiza, Provincia de Buenos Aires </a>
          <br>
          <span class="text-muted">Tel&eacute;fono: (011) 5193-0200 Interno: 99999</span>
        </footer>');
          // return Blade::render('<strong class="success"> '.env('APP_NAME').' </strong>');
        });

      //   Nova::mainMenu(function (Request $request) {

      //     return [
      //         // https://heroicons.com/

      //         MenuSection::dashboard(Main::class)->icon('chart-bar'),

      //         MenuSection::make('Todos', [
      //           // MenuItem::resource(User::class),
      //           // MenuItem::resource(User::class),            
      //         ])->icon('calendar')->collapsable(),

      //         MenuSection::make('Auditorias', [
      //           // MenuItem::resource(User::class),
      //         ])->icon('scale')->collapsable(),


      //         MenuSection::make('Admin', [
      //             MenuItem::resource(User::class),
      //         ])->icon('cog')->collapsable(),

      //     ];
      // });

    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
