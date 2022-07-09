<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SliderRequest;
use App\Models\Banner;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SliderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SliderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Banner::class);
        CRUD::addClause('where', 'type', Banner::SLIDER_BANNER);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/slider');
        CRUD::setEntityNameStrings('slider', 'sliders');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        CRUD::addColumn([
            'name' => 'name',
            'label' => 'Nombre',
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'label' => "Imagen",
            'name' => "image",
            'type' => 'image',
        ]);

        CRUD::addColumn([
            'name' => 'order',
            'label' => 'Orden',
            'type' => 'number',
        ]);

        CRUD::addColumn([
            'name' => 'private',
            'label' => 'Privado',
            'type' => 'boolean',
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SliderRequest::class);

        CRUD::addField([
            'name' => 'name',
            'label' => 'Nombre',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'label' => "Imagen",
            'name' => "image",
            'type' => 'image',
            'crop' => true,
            'aspect_ratio' => 1920 / 718,
            'hint' => '(1920 x 718)',
        ]);

        $this->crud->addField([
            'name' => 'type',
            'type' => 'hidden',
            'value' => Banner::SLIDER_BANNER
        ]);

        CRUD::addField([
            'name' => 'order',
            'label' => 'Orden',
            'type' => 'number',
            'value' => 0,
            'hint' => 'Solo para los banners sliders',
        ]);

        CRUD::addField([
            'name' => 'private',
            'label' => 'Privado',
            'type' => 'boolean',
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
