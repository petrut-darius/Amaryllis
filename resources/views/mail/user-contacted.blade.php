<x-mail::message>
# New Inquiry Received

You have received a new contact inquiry from the website.

**Contact Details:**
- **Name:** {{ $contact->name }}
- **Email:** {{ $contact->email }}
- **Phone:** {{ $contact->phone }}

**Subject:**
{{ $contact->subject }}

**Message:**
{{ $contact->message }}

<x-mail::panel>
**Submission Metadata:**
- **Date:** {{ $contact->created_at->format('M d, Y H:i') }}
</x-mail::panel>

Best regards,
**Amaryllis Floral Design**
</x-mail::message>
