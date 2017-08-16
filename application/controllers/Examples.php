<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null, $data)
	{
        $this->load->view('back/daycare/header_view_k', $data);
		$this->load->view('example.php',(array)$output);
		
        $this->load->view('back/footer_view', $data); 
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function offices_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('offices');
			$crud->set_subject('Office');
			$crud->required_fields('city');
			$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function quizzes()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('quizzes');
			$crud->set_subject('Quizz');
			$crud->display_as('quiztype_id','Quizz Type');
			$crud->set_relation('quiztype_id','quiztypes','description');
			
		/*	
			$crud->display_as('officeCode','Office City');
			$crud->set_subject('Employee');

			$crud->required_fields('lastName');

			$crud->set_field_upload('file_url','assets/uploads/files');
*/
			$output = $crud->render();
	 $data['title'] = 'Quizzes List';    
        $data['active'] = 'Quizzes_List';
			$this->_example_output($output, $data);
	}
	
		public function questions()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('questions');
			$crud->set_subject('Question');
			$crud->display_as('quiz_id','Quizz');
			$crud->display_as('questiontype_id','Question Type');
			$crud->set_relation('quiz_id','quizzes','description');
			$crud->set_relation('questiontype_id','questiontypes','description');
		/*	$crud->set_relation('officeCode','offices','city');
			$crud->display_as('officeCode','Office City');
			$crud->set_subject('Employee');

			$crud->required_fields('lastName');

			$crud->set_field_upload('file_url','assets/uploads/files');
*/
			$output = $crud->render();
	 $data['title'] = 'Quizzes List';    
        $data['active'] = 'Quizzes_List';
			$this->_example_output($output, $data);
	}
	
	public function categories(){
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('categories');
			$crud->set_subject('Category');
			$crud->fields('description');
			$crud->required_fields('description');	
		
			$output = $crud->render();
	 $data['title'] = 'Categories List';    
        $data['active'] = 'Categories_List';
			$this->_example_output($output, $data);
	}
	
	public function quizztypes(){
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('quiztypes');
			$crud->set_subject('Quizz Type');
			$crud->fields('description');
			$crud->required_fields('description');	
		
			$output = $crud->render();
			$data['title'] = 'Quizz Types List';    
        	$data['active'] = 'Quizz_Types_List';
			$this->_example_output($output, $data);
	}
	
	public function questiontypes(){
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('questiontypes');
			$crud->set_subject('Question Type');
			$crud->fields('description');
			$crud->required_fields('description');	
		
			$output = $crud->render();
			$data['title'] = 'Question Types List';    
        	$data['active'] = 'Question_Types_List';
			$this->_example_output($output, $data);
	}

	public function employees_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('employees');
			// where daycare_id = mi daycare
			$crud->set_relation('daycare_id','daycares','name');
			$crud->set_relation('type_employee_id','type_employees','name');
			$crud->display_as('daycare_id','Daycare');
			$crud->display_as('type_employee_id','Type');
			$crud->columns('daycare_id','name','phone','birthdate','gender','type_employee_id', 'job', 'date_of_hired', 'date_of_responsability');
			$crud->set_subject('Employee');
			$crud->unset_add();
			$crud->unset_print();
			$crud->unset_read();
			$crud->unset_edit_fields('daycare_id','user_id', 'created_at', 'updated_at', 'status');
		//	$crud->required_fields('lastName');

			//$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();
 $data['title'] = 'Employee Management';    
        $data['active'] = 'Employee_management';
			$this->_example_output($output, $data);
	}

	public function customers_management()
	{
			$crud = new grocery_CRUD();
	 $data['title'] = 'Employee List';    
        $data['active'] = 'Employee_List';
			$crud->set_table('questions');
			/*$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','lastName');
*/
       
			$output = $crud->render();

			$this->_example_output($output, $data);
			 
	}

	public function orders_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
			$crud->display_as('customerNumber','Customer');
			$crud->set_table('orders');
			$crud->set_subject('Order');
			$crud->unset_add();
			$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function products_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('products');
			$crud->set_subject('Product');
			$crud->unset_columns('productDescription');
			$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	public function film_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('film');
		$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
		$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
		$crud->unset_columns('special_features','description','actors');

		$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

		$output = $crud->render();

		$this->_example_output($output);
	}

	public function film_management_twitter_bootstrap()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('film');
			$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			$crud->unset_columns('special_features','description','actors');

			$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->offices_management2();

		$output2 = $this->employees_management2();

		$output3 = $this->customers_management2();

		$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
		$output = "<h1>List 1</h1>".$output1->output."<h1>List 2</h1>".$output2->output."<h1>List 3</h1>".$output3->output;

		$this->_example_output((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

	public function offices_management2()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('offices');
		$crud->set_subject('Office');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function employees_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('flexigrid');
		$crud->set_table('employees');
		$crud->set_relation('officeCode','offices','city');
		$crud->display_as('officeCode','Office City');
		$crud->set_subject('Employee');

		$crud->required_fields('lastName');

		$crud->set_field_upload('file_url','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function customers_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('customers');
		$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
		$crud->display_as('salesRepEmployeeNumber','from Employeer')
			 ->display_as('customerName','Name')
			 ->display_as('contactLastName','Last Name');
		$crud->set_subject('Customer');
		$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

}
