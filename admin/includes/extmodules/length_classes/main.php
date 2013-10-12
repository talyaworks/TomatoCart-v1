<?php
/*
  $Id: main.php $
  TomatoCart Open Source Shopping Cart Solutions
  http://www.tomatocart.com

  Copyright (c) 2009 Wuxi Elootec Technology Co., Ltd

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/
  echo 'Ext.namespace("Toc.length_classes");';
  
  include('length_classes_grid.php');
  include('length_classes_dialog.php');
?>

Ext.override(TocDesktop.LengthClassesWindow, {

  createWindow: function(){
    var desktop = this.app.getDesktop();
    var win = desktop.getWindow('length_classes-win');
     
    if(!win){
      grd = new Toc.length_classes.LengthClassesGrid({owner: this});
      win = desktop.createWindow({
        id: 'length_classes-win',
        title: '<?php echo $osC_Language->get('heading_title'); ?>',
        width: 800,
        height: 400,
        iconCls: 'icon-length_classes-win',
        layout: 'fit',
        items: grd
      });
    }
    win.show();
  },
    
  createLengthClassesDialog: function() {
    var desktop = this.app.getDesktop();
    var dlg = desktop.getWindow('length_classes-dialog-win');
    
    if(!dlg){
      dlg = desktop.createWindow({}, Toc.length_classes.LengthClassesDialog);
      
      dlg.on('saveSuccess', function (feedback) {
        this.app.showNotification({
          title: TocLanguage.msgSuccessTitle,
          html: feedback
        });
      }, this);
    }
    
    return dlg;
  }
});