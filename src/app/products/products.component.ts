import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import { Product } from '../product';

@Component({
  selector: 'router-outlet',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.css']
})
export class ProductsComponent implements OnInit {
	products: Product[];
	selectedProduct: Product = { id : null , name: null, price: null}
	constructor(private apiService: ApiService) {
		this.apiService.listarProdutos().subscribe((products: Product[])=>{
		this.products = products;
		console.log(this.products);
	}) }
	
	ngOnInit() {}

	createOrUpdateProduct(form){
		form.value.id = this.selectedProduct.id;
		form.value.name = this.selectedProduct.name;
		form.value.price = this.selectedProduct.price;
		if(this.selectedProduct && this.selectedProduct.id){
			this.apiService.atualizarProduto(form.value).subscribe((product: Product)=>{
				console.log("Product updated" , product);
				this.apiService.listarProdutos().subscribe((products: Product[])=>{
					this.products = products;
				})
			});
		}
		else{
			this.apiService.criarProduto(form.value).subscribe((product: Product)=>{
				console.log("Product created, ", product);
				this.apiService.listarProdutos().subscribe((products: Product[])=>{
					this.products = products;
				})
			});
		}
	}

	selecionarProduto(product: Product){
		this.selectedProduct = product;
	}

	apagarProduto(id){
		this.apiService.excluirProduto(id).subscribe((product: Product)=>{
			console.log("Product deleted, ", product);
			this.apiService.listarProdutos().subscribe((products: Product[])=>{
				this.products = products;
			})
		});
	}
}
