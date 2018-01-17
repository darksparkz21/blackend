<?php

namespace Androidizay\Http\Controllers\Admin;

use Androidizay\Http\Requests;
use Backpack\CRUD\Androidizay\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\Androidizay\Http\Requests\CrudRequest as StoreRequest;
use Backpack\CRUD\Androidizay\Http\Requests\CrudRequest as UpdateRequest;

class MenuItemCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Androidizay\Models\MenuItem");
        $this->crud->setRoute(config('backpack.base.route_prefix').'/menu-item');
        $this->crud->setEntityNameStrings('menu item', 'menu items');

        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('name', 2);

        $this->crud->addColumn([
                                'name' => 'name',
                                'label' => 'Label',
                            ]);
        $this->crud->addColumn([
                                'label' => 'Parent',
                                'type' => 'select',
                                'name' => 'parent_id',
                                'entity' => 'parent',
                                'attribute' => 'name',
                                'model' => "Androidizay\Models\MenuItem",
                            ]);

        $this->crud->addField([
                                'name' => 'name',
                                'label' => 'Label',
                            ]);
        $this->crud->addField([
                                'label' => 'Parent',
                                'type' => 'select',
                                'name' => 'parent_id',
                                'entity' => 'parent',
                                'attribute' => 'name',
                                'model' => "Androidizay\Models\MenuItem",
                            ]);
        $this->crud->addField([
                                'name' => 'type',
                                'label' => 'Type',
                                'type' => 'page_or_link',
                                'page_model' => 'Androidizay\Models\Page', // '\Backpack\PageManager\app\Models\Page',
                            ]);
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud($request);
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud($request);
    }
}
