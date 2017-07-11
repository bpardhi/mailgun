def postBatchToMailgun(customers):

    batchJson = {} #Create empty Dictionary
    toField = [] #Create empty List

    for customer in customers:
        temp = {} #Create temporary Dictionary
        temp['accountNumber'] = customer["id"]
        temp['name'] = customer["name"]
        temp['emailCampaignId'] = "30 Day Follow-up"
        batchJson[customer["email"]] = temp # Assign dictionary of attributes to email
        address dictionary item
        toField.append(customer["email"]) # Populate list with email addresses for To
        field via List append
        batchJson = json.dumps(batchJson) # Convert Dictionary of attributes to JSON

    return requests.post("https://api.mailgun.net/v2/samples.mailgun.org/messages",
        auth=("api", "key-3ax6xnjp29jd6fds4gc373sgvjxteol0"),
        data={"from": "Pro User <me@samples.mailgun.org>",
        "to": toField,
        "subject": "Hi %recipient.name%, Check This Out!",
        "html": "Promo HTML Here",
        "v:Customer-Account-Number": "%recipient.accountNumber%",
         #In production, you should hash this account number, or you may risk exposing
         sensitive customer data.
        "v:Email-Campaign-Id": "%recipient.emailCampaignId%",
        "recipient-variables": batchJson})
