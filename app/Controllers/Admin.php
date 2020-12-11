<?php namespace App\Controllers;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sell;
use App\Models\ReturnedAmount;
use App\Models\Buy;
use CodeIgniter\Controller;
class Admin extends Controller
{


	public function adminDashboard()
	{
		$session = session();
        $user = $session->get('username');
        $data['user']=$user;
		$data['title']='Dashboard';

		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$customerModel=new Customer();
        	$customerBuilder = $customerModel->builder();
        	$data['numberOfCustomer']= $customerBuilder->countAllResults();

        	$productModel=new Product();
        	$productBuilder = $productModel->builder();
        	$data['numberOfProduct']= $productBuilder->countAllResults();

        	$sellModel=new Sell();
        	$sellBuilder = $sellModel->builder();
        	$data['numberOfSell']= $sellBuilder->countAllResults();

        	$returnModel=new ReturnedAmount();
        	$returnBuilder = $returnModel->builder();
        	$data['numberOfReturn']= $returnBuilder->countAllResults();
        	
        	return view('adminDashboard',$data);
        }

	}


	public function addNewCustomer()
	{
		$session = session();
        $user = $session->get('username');
        $data['user']=$user;
		$data['title']='Add Customer';

		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	return view('addNewCustomer',$data);
        }

		
	}


	public function submitCustomerInformation()
	{
		$session = session();
		if (!$session->has('username')) 
		{
			return $this->response->redirect(site_url('home'));
		}
		else
		{
			$validation_value=$this->validate([
			'name'=>'required',
			'address'=>'required',
			'number'=>'required',
			'date'=>'valid_date'
		]);

		//$data['errors']=$this->validator->getErrors();
		
        $user = $session->get('username');
        $data['user']=$user;
		$data['title']='Add Customer';
		$data['validation']=$this->validator;

		$CustomerModel=new Customer();

		if (!$validation_value) 
		{
			echo view('addNewCustomer',$data);
		}
		else
		{
			$customerInfo = [
        			'name' => $this->request->getvar('name'),
        			'address'=> $this->request->getvar('address'),
        			'mobile'=>$this->request->getvar('number'),
        			'email'=>$this->request->getvar('email'),
        			'registration_date'=>$this->request->getvar('date')
					];

			$CustomerModel->insert($customerInfo);
			$data['submitted']='One Customer Added Successfully.';
			echo view('addNewCustomer',$data);
		}
		}

	}



	public function allCustomersInformation()
	{
		$session = session();


		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$user = $session->get('username');
	        $data['user']=$user;
			$data['title']='Customer Information';

			$CustomerModel=new Customer();
			$data['customersInfo']=$CustomerModel->findAll();
			echo view('allCustomersInformation',$data);
        }

	}

	public function deleteCustomerInfo($customerId)
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$CustomerModel=new Customer();
			$CustomerModel->delete($customerId);
			return $this->response->redirect(site_url('admin/allCustomersInformation'));
        }
	}

	public function editCustomerInfo($customerId)
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$CustomerModel=new Customer();
			$CustomerModel->update($customerId,$_POST);
			return $this->response->redirect(site_url('admin/allCustomersInformation'));
        }	
	}





	public function addProduct()
	{
		$session = session();

		if (!$session->has('username'))
		{
			return $this->response->redirect(site_url('home'));
		}
		else
		{ 
			$user = $session->get('username');
        	$data['user']=$user;
        	$data['title']="Add Product";
			return view('addProduct',$data);
		}
	}

	public function submitProductInformation()
	{
		$session = session();

		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$validation_value=$this->validate([
			'productName'=>'required',
			'productType'=>'required',
			'productAddDate'=>'valid_date'
			]);

			$user = $session->get('username');
	        $data['user']=$user;
			$data['title']='Add Product';
			$data['validation']=$this->validator;

			$ProductModel=new Product();

			if (!$validation_value) 
			{
				echo view('addProduct',$data);
			}
			else
			{
				$ProductInfo = [
	        			'productName' => $this->request->getvar('productName'),
	        			'productType'=>$this->request->getvar('productType'),
	        			'productAddDate'=>$this->request->getvar('productAddDate')
						];

				$ProductModel->insert($ProductInfo);
				$data['submitted']='One Product Added Successfully.';
				return view('addProduct',$data);
			}

        }
	}


	public function productList()
	{
		$session = session();


		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$user = $session->get('username');
	        $data['user']=$user;
			$data['title']='Products';

			$ProductModel=new Product();
			$data['productsInfo']=$ProductModel->findAll();
			echo view('productList',$data);
        }

    }


	public function deleteProductInfo($productId)
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$ProductModel=new Product();
			$ProductModel->delete($productId);
			return $this->response->redirect(site_url('admin/productList'));
        }
	}

	public function editProductInfo($productId)
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$ProductModel=new Product();
			$ProductModel->update($productId,$_POST);
			return $this->response->redirect(site_url('admin/productList'));
        }	
	}


	public function newTransaction()
	{
		$session = session();

		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$user = $session->get('username');
        	$data['user']=$user;
        	$CustomerModel=new Customer();
			$data['customersInfo']=$CustomerModel->findAll();
			$data['title']="New Transaction";
			
        	echo view('newTransaction',$data);

        }

	}


	public function sell($customerId,$customerName,$customerNumber,$customerAddress)
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$user = $session->get('username');
        	$data['user']=$user;
			$data['customerId']=urldecode($customerId);
			$data['customerName']=urldecode($customerName);
			$data['customerNumber']=urldecode($customerNumber);
			$data['customerAddress']=urldecode($customerAddress);
			$data['title']="Sell";
			//This is for option in product select box
			$ProductModel=new Product();
			$data['productsInfo']=$ProductModel->findAll();

        	return view('sell',$data);
        }
	}

	public function sellDataSave()
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {	
        	
       		$data = [];
			$tmp_data = [
			    'customerId' => $_POST['customerId'],
			    'transactionType' => $_POST['transactionType'],
			    'productName' => $_POST['productName'],
			    'quantity' => $_POST['quantity'],
			    'unit' => $_POST['unit'],
			    'price' => $_POST['price'],
			    'payment' => $_POST['payment'],
			    'sellDate' => $_POST['sellDate']
			];
			
			foreach ($tmp_data as $k => $v) 
			{
			    for($i = 0; $i < count($v);$i++) 
			    {
			        $data[$i][$k] = $v[$i];
			    }
			}
        		$sellModel=new Sell();
	        	$sellModel->insertBatch($data);
        		return $this->response->redirect(site_url('admin/newTransaction'));
        }
	}


	public function sellDetails()
	{
		$session = session();


		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$user = $session->get('username');
	        $data['user']=$user;
			$data['title']='Sell Details';

			$ProductModel=new Product();
			$data['productsInfo']=$ProductModel->findAll();
			
			$sellDetailsModel=new Sell();
			$data['sellInfo']=$sellDetailsModel->findAll();
			echo view('sellDetails',$data);
        }

    }

    public function deleteSellInfo($sellId)
    {
    	$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$sellModel=new Sell();
			$sellModel->delete($sellId);
			return $this->response->redirect(site_url('admin/sellDetails'));
        }
    }


    public function editSellInfo($sellId)
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$sellModel=new Sell();
			$sellModel->update($sellId,$_POST);
			return $this->response->redirect(site_url('admin/sellDetails'));
        }	
	}


	public function returnProduct($customerId,$customerName,$customerNumber,$customerAddress)
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$user = $session->get('username');
        	$data['user']=$user;
			$data['customerId']=urldecode($customerId);
			$data['customerName']=urldecode($customerName);
			$data['customerNumber']=urldecode($customerNumber);
			$data['customerAddress']=urldecode($customerAddress);
			$data['title']="Return";
			//This is for option in product select box
			$ProductModel=new Product();
			$data['productsInfo']=$ProductModel->findAll();

        	return view('returnProduct',$data);
        }
	}



	public function returnDataSave()
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {	
        	
       		$data = [];
			$tmp_data = [
			    'customerId' => $_POST['customerId'],
			    'transactionType' => $_POST['transactionType'],
			    'productName' => $_POST['productName'],
			    'quantity' => $_POST['quantity'],
			    'unit' => $_POST['unit'],
			    'price' => $_POST['price'],
			    'returnedAmount' => $_POST['returnedAmount'],
			    'returnDate' => $_POST['returnDate']
			];
			
			foreach ($tmp_data as $k => $v) 
			{
			    for($i = 0; $i < count($v);$i++) 
			    {
			        $data[$i][$k] = $v[$i];
			    }
			}
        		$returnModel=new ReturnedAmount();
	        	$returnModel->insertBatch($data);
        		return $this->response->redirect(site_url('admin/newTransaction'));
        }
	}



	public function returnDetails()
	{
		$session = session();


		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$user = $session->get('username');
	        $data['user']=$user;
			$data['title']='Return Details';

			$ProductModel=new Product();
			$data['productsInfo']=$ProductModel->findAll();
			
			$returnDetailsModel=new ReturnedAmount();
			$data['returnInfo']=$returnDetailsModel->findAll();
			echo view('returnDetails',$data);
        }

    }



    public function deletereturnInfo($returnId)
    {
    	$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$returnDetailsModel=new ReturnedAmount();
			$returnDetailsModel->delete($returnId);
			return $this->response->redirect(site_url('admin/returnDetails'));
        }
    }


    public function editReturnInfo($returnId)
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$returnDetailsModel=new ReturnedAmount();
			$returnDetailsModel->update($returnId,$_POST);
			return $this->response->redirect(site_url('admin/returnDetails'));
        }	
	}


	public function accountDetails($customerId)
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$user = $session->get('username');
	        $data['user']=$user;
			$data['title']='Account Details';

			$customerId=$customerId;
			
			//customer information using customer id from customer model
			$customerModel= new Customer();
			$customerDetails = $customerModel->find($customerId);

			$data['id']=$customerId;
			$data['customerName']=$customerDetails['name'];
			$data['customerAddress']=$customerDetails['address'];
			$data['customerMobile']=$customerDetails['mobile'];
			$data['customerEmail']=$customerDetails['email'];


			//sell information using customer id from customer model
			
			
			$db      = \Config\Database::connect();
			$sellBuilder = $db->table('sell');

			//total product price from sell table
			$sellPriceQuery = $sellBuilder->selectSum('price')
			                 ->where('customerId', $customerId)
			                 ->get()->getRow();
			$data['totalProductPrice']=$sellPriceQuery->price;
			
			//total payment from sell table
			$sellPaymentQuery = $sellBuilder->selectSum('payment')
			                 ->where('customerId', $customerId)
			                 ->get()->getRow();
			$data['totalPayment']=$sellPaymentQuery->payment;

			//total returned product price
			$returnBuilder = $db->table('returnproduct');

			$returnedProductQuery = $returnBuilder->selectSum('price')
			                 ->where('customerId', $customerId)
			                 ->get()->getRow();
			$data['returnedProductPrice']=$returnedProductQuery->price;

			$returnedAmountQuery = $returnBuilder->selectSum('returnedAmount')
			                 ->where('customerId', $customerId)
			                 ->get()->getRow();
			$data['returned']=$returnedAmountQuery->returnedAmount;



			$data['currentBalance']=($data['totalPayment']-$data['returned'])-($data['totalProductPrice']-$data['returnedProductPrice']);

			echo view('accountDetails',$data);
        }
	}



    public function buyProduct($productId,$productName)
    {
    	$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$user = $session->get('username');
	        $data['user']=$user;
			$data['title']='Buy Product';
        	$data['productId']=$productId;
        	$data['productName']=$productName;
        	echo view('buyProduct',$data);

        	// buyId,productId,product name, quantity, unit ,price
        }
    }


    public function buyProductSubmit()
    {

    	$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	
	  		$user = $session->get('username');
	       

			$buyModel=new Buy();

			
			$buyInfo = [
						'productId' => $this->request->getvar('productId'),
	        			'productName' => $this->request->getvar('productName'),
	        			'quantity'=>$this->request->getvar('quantity'),
	        			'unit' => $this->request->getvar('unit'),
	        			'price' => $this->request->getvar('price'),
	        			'date'=>$this->request->getvar('date')
					];		

				$submitted='Saved Successfully..!';
			$data=[
				'user'=>$user,
				'title'=>'Buy Product',
				'productId'=>$this->request->getvar('productId'),
				'productName'=>$this->request->getvar('productName'),
				'submitted'=>$submitted
			];

			if ($buyModel->insert($buyInfo)) {
				echo view('buyProduct',$data);
			}
			
		
        }
    }

	public function buyDetails()
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$user = $session->get('username');
        	$data['title']='Buy Details';
        	$data['user']=$user;
        	$BuyModel=new Buy();
			$data['buyInfo']=$BuyModel->findAll();
        	return view('buyDetails',$data);
        }	
	}


public function deleteBuyInfo($buyId)
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$buyModel=new Buy();
			$buyModel->delete($buyId);
			return $this->response->redirect(site_url('admin/buyDetails'));
        }
	}

	public function editBuyInfo($buyId)
	{
		$session = session();
		if (!$session->has('username')) 
		{
            return $this->response->redirect(site_url('home'));
        }
        else
        {
        	$buyModel=new Buy();
			$buyModel->update($buyId,$_POST);
			return $this->response->redirect(site_url('admin/buyDetails'));
        }	
	}




}





?>