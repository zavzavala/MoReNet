<?php

namespace App\Http\Livewire;

use App\Models\empresa;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class tbl_empresas extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\empresa>
    */
    public function datasource()
    {
        return empresa::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('empresa')

           /** Example of custom column using a closure **/
            ->addColumn('empresa_lower', function (empresa $model) {
                return strtolower(e($model->empresa));
            })

            ->addColumn('telefone')
            ->addColumn('email')
            ->addColumn('localizacao')
            ->addColumn('data_contrato_formatted', fn (empresa $model) => Carbon::parse($model->data_contrato)->format('d/m/Y'))
            ->addColumn('nuit')
            ->addColumn('descricao')
            ->addColumn('tipo_empresa')
            ->addColumn('url');
            //->addColumn('created_at_formatted', fn (empresa $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            //->addColumn('updated_at_formatted', fn (empresa $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            /*  Column::make('ID', 'id')
                    ->makeInputRange(),
            */
            Column::make('EMPRESA', 'empresa')
                ->sortable()
                ->searchable(),
                

            Column::make('TELEFONE', 'telefone')
                ->sortable()
                ->searchable(),
                

            /* Column::make('EMAIL', 'email')
                ->sortable()
                ->searchable()
                ->makeInputText(),
 */
           /*  Column::make('LOCALIZACAO', 'localizacao')
                ->sortable()
                ->searchable()
                ->makeInputText(), */

            Column::add('DATA CONTRATO', 'data_contrato_formatted', 'data_contrato')
                ->searchable()
                ->sortable(),
                //->makeInputDatePicker(),

           /*  Column::make('NUIT', 'nuit')
                ->makeInputRange(), */

           /*  Column::make('DESCRICAO', 'descricao')
                ->sortable()
                ->searchable()
                ->makeInputText(), */

            Column::make('TIPO EMPRESA', 'tipo_empresa')
                ->sortable()
                ->searchable()
              ,

           /*  Column::make('URL', 'url')
                ->sortable()
                ->searchable()
                ->makeInputText(), */

          /*   Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(), */

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid empresa Action Buttons.
     *
     * @return array<int, Button>
     */

    
    public function actions(): array
    {
        return [
           /*  Button::make('edit', 'Edit')
            ->class('bg-indigo-500 cursor-pointer text-blue px-3 py-2.5 m-1 rounded text-sm')
            //->route('editEmpresa', ['empresa' => 'id']),
            ->route('autor.empresas.edit', ['empresa' => 'id']),
            
            Button::make('destroy', 'Delete')
            ->class('bg-red-500 cursor-pointer text-red px-3 py-2 m-1 rounded text-sm id="deletefactura"' )
            ->route('autor.empresas.destroy', ['empresa' => 'id'])
            ->method('delete') */

        ];
        
    }
    

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid empresa Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($empresa) => $empresa->id === 1)
                ->hide(),
        ];
    }
    */
}
