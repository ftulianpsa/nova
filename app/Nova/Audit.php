<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Audit extends Resource
{

    public static function singularLabel()
    {
        return 'Auditoria';
    }

    public static function label() {
        return 'Auditorias';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Audit>
     */
    public static $model = \App\Models\Audit::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'event', 'created_at'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            // ID::make()->sortable(),
            BelongsTo::make('Ejecutor','user','App\Nova\User')->showOnPreview(),
            Text::make(__('Evento'), 'event')->showOnPreview(),
            DateTime::make(__('Fecha/Hora'), 'created_at')->showOnPreview(),
            Text::make(__('Valor viejo'), 'old_values'),
            Text::make(__('Valor Nuevo'), 'new_values'),
            
            Code::make('Valor viejo', 'old_values')
            ->resolveUsing(function ($value) {
                return json_decode($value, true);
            })->json()->showOnPreview(),
            Code::make('Valor nuevo', 'new_values')
            ->resolveUsing(function ($value) {
                return json_decode($value, true);
            })->json()->showOnPreview(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
