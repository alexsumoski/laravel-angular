import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NavigationComponent } from './navigation/navigation.component';
import { MenuComponent } from './menu/menu.component';
import { SecureComponent } from './secure.component';
import { RouterModule } from '@angular/router';


@NgModule({
  declarations: [
    NavigationComponent,
    MenuComponent,
    SecureComponent
  ],
  exports: [
    SecureComponent
  ],
  imports: [
    CommonModule,
    RouterModule
  ]
})
export class SecureModule { }
