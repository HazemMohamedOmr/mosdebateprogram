document.querySelectorAll('.toggle-form').forEach(toggle => {
    toggle.addEventListener('change', function () {
        const formType = this.getAttribute('data-type');
        const isChecked = this.checked;

        // Send AJAX request
        fetch(`/admin/toggle-form/${formType}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ status: isChecked })
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // Show success notification
                Swal.fire({
                    title: 'حالة النموذج',
                    text: `تم ${data.status ? 'فتح' : 'إغلاق'} ${formType === 'invitation' ? 'نموذج الحضور' : 'نموذج تسجيل الفرق الجامعية'} بنجاح.`,
                    icon: 'success',
                    confirmButtonText: 'تم'
                });
            })
            .catch(error => {
                console.error('Error:', error);

                // Show error notification
                Swal.fire({
                    title: 'خطأ',
                    text: 'حدث خطأ أثناء تحديث حالة النموذج. الرجاء المحاولة لاحقاً.',
                    icon: 'error',
                    confirmButtonText: 'حسنًا'
                });
            });
    });
});