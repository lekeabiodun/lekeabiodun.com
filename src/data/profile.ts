/**
 * Gate configuration for the homepage — P08 §2.2 (Homepage V0).
 *
 * THE RULE, from §2.2: "Do not publish a bracket."
 *
 * Every `null` / `false` below is an unanswered open question. The page reads
 * these and omits the line — or the whole block — rather than rendering a
 * placeholder. Fill a value in and it publishes on the next build. Nothing here
 * should ever hold a guess: §2.5 treats the desk window and the reply SLA as
 * promises, not copy, and §2.7.1 gates the contract bullets on them being
 * literally true of the next engagement.
 *
 * Answers come from SITTING 1 — Sunday 2026-08-23, 18:30–20:00 WAT (§0.1).
 */

export interface RightNow {
    /** One line, copied from the week's source per §2.4. Never composed here. */
    line: string;
    /** ISO date of the Monday it was written. Rendered as "updated <date>". */
    updated: string;
}

/** OQ2 — the working window held in the WORST week, in WAT. e.g. "13:00–19:00 WAT". */
export const deskWindow: string | null = null;

/** OQ3 — a monitored, SPF/DKIM-authenticated address. Gates the hero line, the footer and the JSON-LD. */
export const email: string | null = null;

/** OQ4 — a real, checked number of open slots. §2.2: "Do not publish availability you have not checked." */
export const availability: string | null = null;

/**
 * OQ14 — publishes the three "In the contract, before you pay anything" bullets.
 * §2.7.1 Form 2: only true if he honours them on the very next engagement AND
 * they appear verbatim in the scope document the buyer signs.
 */
export const contractCommitments = false;

/**
 * §2.7.2 — the reference bullet. Does NOT publish in V0. Unlocks only when a
 * named client confirms in writing (question 2 of the 2026-08-25 four-client
 * email). Zero replies by 2026-09-28 → never publishes.
 */
export const referenceBullet = false;

/**
 * §7.2 item 9 / §3.3 item 5 — two Calendly events, nothing else. The generic
 * `/discovery-call` is retired and redirected, not reused: it qualifies nobody.
 * `sprint-15` must offer Monday and Thursday start dates only (Rule S3) and
 * carry its five qualification questions before it is linked from anywhere.
 */
export const calendlySpecTools20: string | null = null;
export const calendlySprint15: string | null = null;

/** §3.2 — open Sprint slots for the next 30 days, refreshed Mondays. OQ4. */
export const sprintSlots: string | null = null;

/**
 * §3.6 — the "How do I pay you?" answer. THE GATE (§3.6 step 4): nothing about
 * payment publishes until the $1 ACH test has passed. If it has not passed by
 * Friday 2026-09-11, publish `entity` and `w8Form` only and leave `accountLine`
 * null — the account line is deleted, not softened.
 *
 * `coiMsa` is named only if a certificate of insurance or signable MSA actually
 * exists; an offered-but-nonexistent COI is worse than an absent one.
 *
 * Never put account numbers here. §3.6: the page names the mechanism, the
 * details go on the invoice.
 */
export interface PaymentRail {
    /** Step 1 — the invoicing entity, used on every document without variation. */
    entity: string;
    /** Step 3 — "W-8BEN" (personal) or "W-8BEN-E" (registered entity). */
    w8Form: 'W-8BEN' | 'W-8BEN-E';
    /** Steps 2 + 4 — the provider behind the US-routing account. Null until the $1 test passes. */
    accountLine: string | null;
    /** Step 5 — only if these exist. */
    coiMsa: string | null;
}

export const paymentRail: PaymentRail | null = null;

/** Set once /work-with-me (§3.2) is live. Until then the second CTA does not render. */
export const workWithMeUrl: string | null = '/work-with-me';

/**
 * §2.4 — rewritten every Monday at 11:45, or deleted. Set to `null` on any week
 * with no line to put in it: "A stale RIGHT NOW is worse than no RIGHT NOW."
 * Deleted three Mondays running → remove the block permanently.
 */
export const rightNow: RightNow | null = null;
