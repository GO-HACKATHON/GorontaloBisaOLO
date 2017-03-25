
function previewFile(){
   var preview = document.querySelector('img'); //selects the query named img
   var file    = document.querySelector('input[type=file]').files[0]; //sames as here
   var reader  = new FileReader();

   reader.onloadend = function () {
	   $("#imgprev").attr('src',reader.result);
	   alert($("#imgprev").attr('src'));
	   
    }

   if (file) {
	   reader.readAsDataURL(file); //reads the data as a URL
   } else {
	   preview.src = "";
   }
}
function timeSince(timeStamp) {
    
	var timeAgo = new Date(timeStamp);
    if (Object.prototype.toString.call(timeAgo) === "[object Date]") {
            if (isNaN(timeAgo.getTime())) {
                return 'Not Valid';
            } else {
                var seconds = Math.floor((new Date() - timeAgo) / 1000),
                intervals = [
                    Math.floor(seconds / 31536000),
                    Math.floor(seconds / 2592000),
                    Math.floor(seconds / 86400),
                    Math.floor(seconds / 3600),
                    Math.floor(seconds / 60)
                ],
                times = [
                    'year',
                    'month',
                    'day',
                    'hour',
                    'minute'
                ];

                var key;
                for(key in intervals) {
                    if (intervals[key] > 1)  
                        return intervals[key] + ' ' + times[key] + 's ago';
                    else if (intervals[key] === 1) 
                        return intervals[key] + ' ' + times[key] + ' ago';
                }

                return Math.floor(seconds) + ' seconds ago';
            }
        } else {
            return 'Not Valid';
        }
 }
 