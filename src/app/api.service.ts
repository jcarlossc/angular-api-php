import { Injectable } from '@angular/core';
import { Product } from './product';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})

export class ApiService {
	PHP_API = "http://localhost/projetos/angular-api-php/api-php";
	constructor(private httpClient: HttpClient) {}
	listarProdutos(): Observable<Product[]>{
		return this.httpClient.get<Product[]>(`${this.PHP_API}/index.php`);
	}
	criarProduto(product: Product): Observable<Product>{
		return this.httpClient.post<Product>(`${this.PHP_API}/create_product.php`, product);
	}
	atualizarProduto(product: Product){
		return this.httpClient.put<Product>(`${this.PHP_API}/update_product.php`, product);
	}
	excluirProduto(id: number){
		return this.httpClient.delete<Product>(`${this.PHP_API}/delete_product.php/?id=${id}`);
	}
}
