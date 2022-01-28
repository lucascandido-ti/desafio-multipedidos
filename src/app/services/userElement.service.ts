import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { UserElement } from '../model/UserElement';

@Injectable()
export class UserElementService {
  
  //URL for Backend Access 
  elementApiUrl = 'http://localhost:8000/users'
  constructor(private http: HttpClient) { }

  //Function to list all users
  getUsers():Observable<UserElement[]>{
    return this.http.get<UserElement[]>(`${this.elementApiUrl}/list`)
  }

  //Function to create new user
  createUsers(element: UserElement):Observable<UserElement>{
    return this.http.post<UserElement>(`${this.elementApiUrl}/insert`,element);
  }

  //Function to edit user
  editUsers(element: UserElement):Observable<UserElement>{
    return this.http.put<UserElement>(`${this.elementApiUrl}/update`,element);
  }

  //Function to delete user
  deleteUsers(id: Number):Observable<any>{
    return this.http.delete<any>(`${this.elementApiUrl}/delete/${id}`);
  }
}