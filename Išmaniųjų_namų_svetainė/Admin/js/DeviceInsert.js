
        document.getElementById('checkboxlock').addEventListener('change', (e) => {
        var status= this.checkboxValue = e.target.checked ? 'Lockon' : 'Lockoff';
        $.ajax({
            type: "POST",
            url: "../configs/dbconfigdevice.php",
            data: {StatusLock:status},
            success:function(data){ }

        });
       console.log(status);
        });

            document.getElementById('checkboxfan').addEventListener('change', (e) => {
            var status= this.checkboxValue = e.target.checked ? 'Fanon' : 'Fanoff';
            $.ajax({
                type: "POST",
                url: "../configs/dbconfigdevice.php",
                data: {StatusFan:status},
                success:function(data){ }
    
            });
           console.log(status);
            });

                document.getElementById('checkboxledw').addEventListener('change', (e) => {
                var status= this.checkboxValue = e.target.checked ? 'LedWon' : 'LedWoff';
                $.ajax({
                    type: "POST",
                    url: "../configs/dbconfigdevice.php",
                    data: {StatusLedW:status},
                    success:function(data){ }
        
                });
               console.log(status);
                });

                    document.getElementById('checkboxledB').addEventListener('change', (e) => {
                    var status= this.checkboxValue = e.target.checked ? 'LedBon' : 'LedBoff';
                    $.ajax({
                        type: "POST",
                        url: "../configs/dbconfigdevice.php",
                        data: {StatusLedB:status},
                        success:function(data){ }
            
                    });
                   console.log(status);
                    });

                        document.getElementById('checkboxLedR').addEventListener('change', (e) => {
                        var status= this.checkboxValue = e.target.checked ? 'LedRon' : 'LedRoff';
                        $.ajax({
                            type: "POST",
                            url: "../configs/dbconfigdevice.php",
                            data: {StatusLedR:status},
                            success:function(data){ }
                
                        });
                       console.log(status);
                        });

                            document.getElementById('checkboxrelay1').addEventListener('change', (e) => {
                            var status= this.checkboxValue = e.target.checked ? 'Relay1on' : 'Relay1off';
                            $.ajax({
                                type: "POST",
                                url: "../configs/dbconfigdevice.php",
                                data: {Statusrelay1:status},
                                success:function(data){ }
                    
                            });
                           console.log(status);
                            });

                                document.getElementById('checkboxrelay2').addEventListener('change', (e) => {
                                var status= this.checkboxValue = e.target.checked ? 'relay2on' : 'relay2off';
                                $.ajax({
                                    type: "POST",
                                    url: "../configs/dbconfigdevice.php",
                                    data: {Statusrelay2:status},
                                    success:function(data){ }
                        
                                });
                               console.log(status);
                                });

                                    document.getElementById('checkboxLedG').addEventListener('change', (e) => {
                                    var status= this.checkboxValue = e.target.checked ? 'LedGon' : 'LedGoff';
                                    $.ajax({
                                        type: "POST",
                                        url: "../configs/dbconfigdevice.php",
                                        data: {StatusLedG:status},
                                        success:function(data){ }
                            
                                    });
                                   console.log(status);
                                    });
