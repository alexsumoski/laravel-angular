import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NavigationComponent } from './navigation/navigation.component';
import { MenuComponent } from './menu/menu.component';
import { SecureComponent } from './secure.component';


@NgModule({
  declarations: [
    NavigationComponent,
    MenuComponent,
    SecureComponent
  ],
  imports: [
    CommonModule
  ]
})
export class SecureModule { }
